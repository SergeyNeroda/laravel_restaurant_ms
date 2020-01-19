<?php

// Admin
Breadcrumbs::register('admin', function ($breadcrumbs) {
    $breadcrumbs->push('Admin', route('admin'));
});
