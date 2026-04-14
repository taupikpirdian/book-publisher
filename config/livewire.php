<?php

return [

    /*
    |---------------------------------------------------------------------------
    | Class Namespace
    |---------------------------------------------------------------------------
    |
    | This value sets the root class namespace for Livewire component classes in
    | your application. This value will change where component auto-discovery
    | finds components. It's also used by livewire:make command.
    |
    */

    'class_namespace' => 'App\\Livewire',

    /*
    |---------------------------------------------------------------------------
    | View Path
    |---------------------------------------------------------------------------
    |
    | This value is used to specify where Livewire component Blade templates are
    | stored when running file:make or make:livewire commands.
    |
    */

    'view_path' => resource_path('views/livewire'),

    /*
    |---------------------------------------------------------------------------
    | Layout
    |---------------------------------------------------------------------------
    | The default layout view that will be used when rendering Livewire components.
    |
    */

    'layout' => 'components.layouts.app',

    /*
    |---------------------------------------------------------------------------
    | Lazy Loading Default
    |---------------------------------------------------------------------------
    |
    | This value sets the default behavior for lazy loading components. If set
    | to true, components will be lazy loaded by default.
    |
    */

    'lazy' => false,

    /*
    |---------------------------------------------------------------------------
    | File Upload Temporary URL Configuration
    |---------------------------------------------------------------------------
    |
    | Livewire generates temporary signed URLs for file uploads by default.
    | These URLs have an expiration time. Setting 'temporary_url' to false
    | will use session-based file handling instead, which can prevent 401
    | errors caused by expired signed URLs.
    |
    */

    'temporary_file_upload' => [
        'disk' => null,        // Uses default disk (local)
        'rules' => null,       // Uses default rules
        'directory' => null,   // Uses default directory
        'middleware' => null,  // Uses default middleware
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'woff', 'woff2', 'tif', 'jpg', 'jpeg',
            'mp4', 'mov', 'avi', 'wmv', 'webm', 'pdf',
        ],
        'max_upload_time' => 5,
    ],

    /*
    |---------------------------------------------------------------------------
    | Inject Livewire Assets
    |---------------------------------------------------------------------------
    |
    | This value determines whether Livewire assets are automatically injected
    | into your Blade templates.
    |
    */

    'inject_assets' => true,

    /*
    |---------------------------------------------------------------------------
    | Navigational History Cache
    |---------------------------------------------------------------------------
    |
    | Livewire uses a cache to store navigational history. This cache is
    | automatically cleared when a component is updated.
    |
    */

    'back_button_cache' => false,

    /*
    |---------------------------------------------------------------------------
    | Render On Redirect
    |---------------------------------------------------------------------------
    |
    | Whether Livewire will render the component when a redirect is encountered.
    |
    */

    'render_on_redirect' => false,

    /*
    |---------------------------------------------------------------------------
    | Blade Component Path
    |---------------------------------------------------------------------------
    |
    | This value sets the path for Blade component classes.
    |
    */

    'blade_component_path' => resource_path('views/components'),

];
