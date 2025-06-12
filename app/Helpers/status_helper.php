<?php

// Get status for Admin interface
if (!function_exists('get_samc_admin_status_badge')) {
    function get_samc_admin_status_badge($status)
    {
        switch ($status) {
            case 'DRAFT':
                return '<span class="badge bg-gradient-secondary" data-bs-toggle="tooltip" title="User has saved the registration as a draft.">Draft</span>';
            case 'PENDING_PAYMENT':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="User has completed registration but has not made the payment.">Pending Payment</span>';
            case 'PENDING_INVOICE_PAYMENT':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="User has completed registration but has not made the payment.">Pending Invoice Payment</span>';
            case 'PAYMENT_SUBMITTED':
                return '<span class="badge bg-gradient-primary" data-bs-toggle="tooltip" title="User has submitted payment for the selected SAMC.">Payment Submitted</span>';
            case 'PAYMENT_PENDING_APPROVAL':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="User is waiting for payment approval.">Payment Pending Approval</span>';
            case 'PAID':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The SAMC has been paid.">Paid</span>';
            case 'PAYMENT_APPROVED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The payment has been approved.">Payment Approved</span>';
            case 'AWAITING_REVIEWER_ASSIGNMENT': //REPLACED WITH PAID & PAYMENT APPROVED
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="User is waiting for admin to assign a reviewer.">Awaiting Reviewer Assignment</span>';
            case 'AWAITING_REVIEWER_RESPONSE':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="Waiting for the reviewer to accept or reject the review request.">Awaiting Reviewer Response</span>';
            case 'AWAITING_REVIEWER_REVIEW':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="Waiting for the user to complete the reviewing process.">Awaiting User Review</span>';
            case 'REVIEW_COMPLETED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The reviewer has completed the review.">Review Completed</span>';
            case 'AWAITING_ADMIN_VALIDATION':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="The review result is awaiting admin validation.">Awaiting Admin Validation</span>';
            case 'APPROVED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The document has been approved.">Approved</span>';
            case 'APPROVED_WITH_AMENDMENTS':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="The document is approved but requires amendments.">Approved with Amendments</span>';
            case 'REJECTED':
                return '<span class="badge bg-gradient-danger" data-bs-toggle="tooltip" title="The document has been rejected.">Rejected</span>';
            default:
                return '<span class="badge bg-gradient-secondary" data-bs-toggle="tooltip" title="The status of the document is unknown.">Unknown Status</span>';
        }
    }
}

// Get status for Assessor interface
if (!function_exists('get_samc_asr_status_badge')) {
    function get_samc_asr_status_badge($status)
    {
        switch ($status) {
            case 'AWAITING_REVIEWER_ASSIGNMENT': //REPLACED WITH PAID & PAYMENT APPROVED
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="User is waiting for admin to assign a reviewer.">Awaiting Reviewer Assignment</span>';
            case 'AWAITING_REVIEWER_RESPONSE':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="Waiting for the reviewer to accept or reject the review request.">Awaiting Reviewer Response</span>';
            case 'AWAITING_REVIEWER_REVIEW':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="Waiting for the user to complete the reviewing process.">Awaiting Review</span>';
            case 'REVIEW_COMPLETED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The reviewer has completed the review.">Review Completed</span>';
            case 'AWAITING_ADMIN_VALIDATION':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="The review result is awaiting admin validation.">Awaiting Admin Validation</span>';
            case 'APPROVED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The document has been approved.">Approved</span>';
            case 'APPROVED_WITH_AMENDMENTS':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="The document is approved but requires amendments.">Approved with Amendments</span>';
            case 'REJECTED':
                return '<span class="badge bg-gradient-danger" data-bs-toggle="tooltip" title="The document has been rejected.">Rejected</span>';
            default:
                return '<span class="badge bg-gradient-secondary" data-bs-toggle="tooltip" title="The status of the document is unknown.">Unknown Status</span>';
        }
    }
}

// Get status for Provider interface
if (!function_exists('get_samc_pvd_status_badge')) {
    function get_samc_pvd_status_badge($status)
    {
        switch ($status) {
            case 'DRAFT':
                return '<span class="badge bg-gradient-secondary" data-bs-toggle="tooltip" title="User has saved the registration as a draft.">Draft</span>';
            case 'PENDING_PAYMENT':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="User has completed registration but has not made the payment.">Pending Payment</span>';
            case 'PENDING_INVOICE_PAYMENT':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="User has completed registration but has not made the payment.">Pending Invoice Payment</span>';
            case 'PAYMENT_SUBMITTED':
                return '<span class="badge bg-gradient-primary" data-bs-toggle="tooltip" title="User has submitted payment for the selected SAMC.">Payment Submitted</span>';
            case 'PAYMENT_PENDING_APPROVAL':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="User is waiting for payment approval.">Payment Pending Approval</span>';
            case 'PAYMENT_APPROVED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The payment has been approved.">Payment Approved</span>';
            case 'PAID':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The SAMC has been paid.">Paid</span>';
            case 'AWAITING_REVIEWER_ASSIGNMENT':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="User is waiting for admin to assign a reviewer.">Awaiting Reviewer Assignment</span>';
            case 'AWAITING_REVIEWER_RESPONSE':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="Waiting for the reviewer to accept or reject the review request.">Awaiting Reviewer Response</span>';
            case 'AWAITING_REVIEWER_REVIEW':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="Waiting for the user to complete the reviewing process.">Awaiting Review</span>';
            case 'AWAITING_USER_REVIEW':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="Waiting for the user to complete the reviewing process.">Awaiting User Review</span>';
            case 'REVIEW_COMPLETED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The reviewer has completed the review.">Review Completed</span>';
            case 'AWAITING_ADMIN_VALIDATION':
                return '<span class="badge bg-gradient-info" data-bs-toggle="tooltip" title="The review result is awaiting admin validation.">Awaiting Admin Validation</span>';
            case 'APPROVED':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip" title="The document has been approved.">Approved</span>';
            case 'APPROVED_WITH_AMENDMENTS':
                return '<span class="badge bg-gradient-warning" data-bs-toggle="tooltip" title="The document is approved but requires amendments.">Approved with Amendments</span>';
            case 'REJECTED':
                return '<span class="badge bg-gradient-danger" data-bs-toggle="tooltip" title="The document has been rejected.">Rejected</span>';
            default:
                return '<span class="badge bg-gradient-secondary" data-bs-toggle="tooltip" title="The status of the document is unknown.">Unknown Status</span>';
        }
    }
}

// Get status for review
if (!function_exists('get_samc_review_status_badge')) {
    function get_samc_review_status_badge($status)
    {
        switch ($status) {
            case 'accepted':
                return '<span class="badge bg-gradient-success" data-bs-toggle="tooltip">ACCEPTED</span>';
            case 'not_accepted':
                return '<span class="badge bg-gradient-danger" data-bs-toggle="tooltip">NOT ACCEPTED</span>';
            default:
                return '<span class="badge bg-gradient-secondary" data-bs-toggle="tooltip" title="The status of the document is unknown.">Unknown Status</span>';
        }
    }
}
