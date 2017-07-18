<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Role settings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during role settings for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    // Flash messages
    'flash-success-role-add'        => "Role added.",
    'flash-success-role-updated'    => ':name permission has been updated.',
    'flash-success-role-delete'     => "We have deleted the permission group.",

    'flash-error-role-delete'       => 'We could not delete the permission group.',
    'flash-error-role-updated'      => "Role with id :id not found.",

    // Buttons
    'view-button-role-delete'       => 'Delete :name',
    'view-button-save'              => 'Save :name permissions',
    'view-button-new'               => 'New',
    'view-button-modal-close'       => 'Close',

    // Modal placeholders
    'placeholder-name'              => 'Role name',

    // Modal names
    'label-name'                    => 'Name',

    // Misc
    'title'                         => 'Roles',
    'title-html'                    => 'Roles & Permissions',
    'view-collapse-heading'         => ':name Permissions',

    // Index view
    'view-error-no-roles'           => "No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.",

];
