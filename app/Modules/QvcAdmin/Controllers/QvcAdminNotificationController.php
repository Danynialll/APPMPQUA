<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\NotificationModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class QvcAdminNotificationController extends BaseController
{
    use ResponseTrait;

    protected $notification_model;

    public function __construct()
    {
        $this->notification_model               = new NotificationModel();
        $this->session                          = service('session');
    }

    public function markAsRead()
    {
        $notificationId = $this->request->getPost('id'); // Get notification ID from POST request

        // Mark the notification as read
        $updated = $this->notification_model->update($notificationId, ['n_is_read' => true]);

        return $this->response->setJSON([
            'success' => $updated ? true : false,
            'csrf_token' => csrf_hash() // Send new CSRF token
        ]);
    }
}
