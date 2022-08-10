<?php

// Json response helper
function json_response($status, $data = array())
{

    if (!is_array($data)) {
        $data = array();
    }

    // Set the JSON header appropriately
    header('Content-Type: application/json');

    // Echo out the array into json
    echo json_encode(array_merge(array('status' => $status), $data));
    exit;
}

function form_field_required()
{
    return '<span class="form-required" title="' . lang('field_required') . '">*</span>';
}

function get_all_user_levels()
{
    $levels = array(
        '1' => 'Admin',
        '2' => 'Gold',
        '3' => 'Silver',
        '4' => 'Bronze',
        '5' => 'Free'
    );
    return $levels;
}

function get_all_user_titles($title = FALSE)
{
    $titles = array(
        'Mr' => 'Mr',
        'Mrs' => 'Mrs',
        'Miss' => 'Miss',
        'Ms' => 'Ms',
        'Prof' => 'Prof',
        'Dr' => 'Dr'
    );

    if ($title) {
        return array('' => lang('select_title')) + $titles;
    }

    return $titles;
}

function get_all_date_options()
{
    $pagination = array(
        'english_date' => 'English (dd/mm/yyyy)'
    );
    return $pagination;
}

function get_all_language_options()
{
    $pagination = array(
        'english' => 'English',
        'french' => 'French'
    );

    return $pagination;
}

function get_all_homepage_options()
{
    $pagination = array(
        'profile' => 'profile',
        'my_projects' => 'My Projects',
        'search_projects' => 'Search Projects'
    );

    return $pagination;
}

function get_all_pagination_options()
{
    $pagination = array(
        5 => 5,
        10 => 10,
        25 => 25,
        50 => 50
    );

    return $pagination;
}

function get_all_unit_options()
{
    $pagination = array(
        'iso' => 'ISO',
        'metric' => 'Metric'
    );

    return $pagination;
}

function get_all_industry_type($select = FALSE)
{
    $industry_type = array(
        'academic' => 'Academic',
        'aerospace' => 'Aerospace',
        'generic' => 'Generic',
        'industrial' => 'Industrial',
        'maritime' => 'Maritime',
        'mining' => 'Mining',
        'nuclear' => 'Nuclear',
        'oilandgas' => 'Oil And Gas',
        'power' => 'Power',
        'process' => 'Process',
        'railandtransport' => 'Rail And Transport',
        'other' => 'Other'
    );

    if ($select) {
        return array('' => lang('industry_placeholder')) + $industry_type;
    }

    return $pagination;
}

function get_level_name($role_id)
{
    switch ($role_id) {
        case 1:
            return 'Admin';
        case 2:
            return 'Gold';
        case 3:
            return 'Silver';
        case 4:
            return 'Bronze';
        case 5:
            return 'Free';
    }
}

function get_component_image_array()
{
    $component = array(
        'beam' => 'Beam',
        'cylinder' => 'Cylinder',
        'disk' => 'Disk',
        'parallelepiped' => 'Parallelepiped',
        'pipe' => 'Pipe',
        'plate' => 'Plate',
        'set_in_nozzle' => 'Set-in Nozzle',
        'set_on_nozzle' => 'Set-on Nozzle',
        't_pipe' => 'T Pipe',
        't_plate' => 'T Plate',
        'other' => 'Other'
    );
    return $component;
}

function get_all_axes()
{
    $axes = array(
        1 => 'Axial (z)',
        2 => 'Hoop (θ)',
        3 => 'Long transverse (Tₗ)',
        4 => 'Longitudinal (L)',
        5 => 'Normal (N)',
        6 => 'Phi (φ)',
        7 => 'Radial (r)',
        8 => 'Short transverse (Tₛ)',
        9 => 'Through Thickness (T)',
        10 => 'Transverse (T)',
        11 => 'X (x)',
        12 => 'Y (y)',
        13 => 'Z (z)'
    );

    return $axes;
}

function print_r2($val)
{
    echo '<pre>';
    print_r($val);
    echo  '</pre>';
}
