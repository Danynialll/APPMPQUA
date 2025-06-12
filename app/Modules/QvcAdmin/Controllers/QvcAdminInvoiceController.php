<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\SamcModel;
use App\Models\AssessorModel;
use App\Models\ProviderModel;
use App\Models\SamcPaymentModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\SamcAssessmentModel;
use App\Models\SamcPaymentItemModel;
use App\Models\CourseContentOutlineModel;
use App\Models\AssessorExpertiseFieldModel;

class QvcAdminInvoiceController extends BaseController
{
    protected $notification_model;
    protected $provider_model;
    protected $samc_model;
    protected $samc_payment;
    protected $samc_payment_item;


    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                   = new ProviderModel();
        $this->notification_model               = new NotificationModel();
        $this->samc_model                       = new SamcModel();
        $this->samc_payment                     = new SamcPaymentModel();
        $this->samc_payment_item                = new SamcPaymentItemModel();
    }

    public function invoiceManagement()
    {
        // Fetch Invoice Payment details or FPX Payment details
        $invoice_info = $this->samc_payment
            ->whereIn('sp_status', ['PENDING_CHECK', 'PAID', 'PAYMENT_PROOF_REJECTED'])
            ->findAll();

        $data = [
            'invoice_info' => $invoice_info
        ];

        $this->render_admin('invoice/manage_invoice', $data);
    }

    // Fetch Invoice Details
    public function fetchInvoiceDetails($invoice_id)
    {
        //invoice id in session
        $this->session->set('sp_invoice_id', $invoice_id);

        return redirect()->to('/qvcAdmin/invoice/view_invoice');
    }

    public function viewInvoice()
    {
        $invoice_id = $this->session->get('sp_invoice_id');

        $invoice_details = $this->samc_payment
            ->where('sp_invoice_number', $invoice_id)
            ->first();

        // Fetch User Details
        $user_details = $this->provider_model
            ->where('pvd_id', $invoice_details->sp_pvd_id)
            ->first();

        if ($invoice_details) {
            // Fetch SAMC for this invoice
            $samc_items = $this->samc_payment_item
                ->select('spi_samc_id, spi_sp_id, spi_created_at, samc_course_name')
                ->join('qvc_upsi.samc', 'samc.samc_id = samc_payment_item.spi_samc_id')
                ->where('spi_sp_id', $invoice_details->sp_id)
                ->findAll();
        } else {
            return $this->response->setJSON(['message' => 'Invoice not found'])->setStatusCode(404);
        }

        $data = [
            'invoice_details' => $invoice_details,
            'samc_items'      => $samc_items,
            'pvd_details'    => $user_details,
        ];
        $this->render_admin('invoice/samc_view_invoice', $data);
    }

    // Approve / Reject Invoice
    public function validateInvoice()
    {
        $invoice_id = $this->request->getPost('invoice_id');
        $status = $this->request->getPost('verification_status');
        $remarks = $this->request->getPost('verification_notes');

        $invoice_details = $this->samc_payment
            ->where('sp_id', $invoice_id)
            ->first();

        if ($invoice_details) {
            // Fetch SAMC for this invoice
            $samc_items = $this->samc_payment_item
                ->select('spi_samc_id, spi_sp_id, spi_created_at, samc_course_name')
                ->join('qvc_upsi.samc', 'samc.samc_id = samc_payment_item.spi_samc_id')
                ->where('spi_sp_id', $invoice_details->sp_id)
                ->findAll();
        } else {
            return $this->response->setJSON(['message' => 'Invoice not found'])->setStatusCode(404);
        }

        if ($status == 'REJECTED') {
            // Update invoice status
            $this->samc_payment
                ->where('sp_invoice_number', $invoice_details->sp_invoice_number)
                ->set([
                    'sp_status'         => 'PAYMENT_PROOF_REJECTED',
                    'sp_remarks'        => $remarks,
                    'sp_updated_date'   => date('Y-m-d H:i:s'),
                ])
                ->update();

            // Update SAMC status
            foreach ($samc_items as $item) {
                $this->samc_model->update($item->spi_samc_id, [
                    'samc_status'           => 'PAYMENT_PROOF_REJECTED',
                    'samc_payment_status'   => 'PAYMENT_PROOF_REJECTED',
                    'samc_updated_date'     => date('Y-m-d H:i:s'),
                ]);
            }
        } else {
            // Update invoice status
            $this->samc_payment
                ->where('sp_invoice_number', $invoice_details->sp_invoice_number)
                ->set([
                    'sp_status' => 'PAID',
                    'sp_remarks'        => $remarks,
                    'sp_updated_date'   => date('Y-m-d H:i:s'),
                ])
                ->update();

            // Update SAMC status
            foreach ($samc_items as $item) {
                $this->samc_model->update($item->spi_samc_id, [
                    'samc_status'           => 'AWAITING_REVIEWER_ASSIGNMENT',
                    'samc_payment_status'   => 'PAID',
                    'samc_updated_date'     => date('Y-m-d H:i:s'),
                ]);
            }
        }

        return redirect()->to('/qvcAdmin/invoice/invoice_management');
    }
}
