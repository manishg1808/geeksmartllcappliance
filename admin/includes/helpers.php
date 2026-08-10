<?php
/**
 * Admin form-type labels and helpers (shared across admin pages).
 */

if (!defined('ADMIN_FORM_TYPES')) {
    define('ADMIN_FORM_TYPES', true);

    /**
     * form_type key => human label used in admin menu and tables.
     */
    function admin_form_types(): array
    {
        return [
            'contact_page'           => 'Contact Page',
            'booking_page'           => 'Booking Page',
            'booking'                => 'Booking Modal',
            'printer_quick_request'  => 'Printer Quick Request',
            'refrigerator_service'   => 'Refrigerator Service',
            'washer_service'         => 'Washer Service',
            'dryer_service'          => 'Dryer Service',
            'oven_service'           => 'Oven Service',
            'dishwasher_service'     => 'Dishwasher Service',
            'commercial_service'     => 'Commercial Service',
        ];
    }

    function admin_form_label(string $type): string
    {
        $types = admin_form_types();
        return $types[$type] ?? ucwords(str_replace('_', ' ', $type));
    }
}
