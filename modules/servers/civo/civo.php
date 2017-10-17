<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function provisioningmodule_MetaData()
{
    return array(
        'DisplayName' => 'Civo WHMCS Module',
        'APIVersion' => '1.1', // Use API Version 1.1
        'RequiresServer' => false // Set true if module requires a server to work
    );
}

function civo_ConfigOptions() {
    return [
        "username" => [
            "FriendlyName" => "UserName",
            "Type" => "text", # Text Box
            "Size" => "25", # Defines the Field Width
            "Description" => "Textbox",
            "Default" => "Example",
        ],
        "password" => [
            "FriendlyName" => "Password",
            "Type" => "password", # Password Field
            "Size" => "25", # Defines the Field Width
            "Description" => "Password",
            "Default" => "Example",
        ],
        "usessl" => [
            "FriendlyName" => "Enable SSL",
            "Type" => "yesno", # Yes/No Checkbox
            "Description" => "Tick to use secure connections",
        ],
        "package" => [
            "FriendlyName" => "Package Name",
            "Type" => "dropdown", # Dropdown Choice of Options
            "Options" => "XSMall,Small,Medium,Large",
            "Description" => "Sample Dropdown",
            "Default" => "",
        ],
        "packageWithNVP" => [
            "FriendlyName" => "Package Name v2",
            "Type" => "dropdown", # Dropdown Choice of Options
            "Options" => [
                'package1' => 'XSmall',
                'package2' => 'Small',
                'package3' => 'Medium',
                'packagee' => 'Large',
            ],
            "Description" => "Sample Dropdown",
            "Default" => "package2",
    ],
        "comments" => [
            "FriendlyName" => "Notes",
            "Type" => "textarea", # Textarea
            "Rows" => "3", # Number of Rows
            "Cols" => "50", # Number of Columns
            "Description" => "Description goes here",
            "Default" => "Enter notes here",
        ],
    ];
}

/**
 * Provision a new instance of a product/service.
 *
 * Attempt to provision a new instance of a given product/service. This is
 * called any time provisioning is requested inside of WHMCS. Depending upon the
 * configuration, this can be any of:
 * * When a new order is placed
 * * When an invoice for a new order is paid
 * * Upon manual request by an admin user
 *
 * @param array $params common module parameters
 *
 * @see https://developers.whmcs.com/provisioning-modules/module-parameters/
 *
 * @return string "success" or an error message
 */
