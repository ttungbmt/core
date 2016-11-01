<?php
return [
    'properties' => [
        'creator'        => 'Maatwebsite',
        'lastModifiedBy' => 'Maatwebsite',
        'title'          => 'Spreadsheet',
        'description'    => 'Default spreadsheet export',
        'subject'        => 'Spreadsheet export',
        'keywords'       => 'maatwebsite, excel, export',
        'category'       => 'Excel',
        'manager'        => 'Maatwebsite',
        'company'        => 'Maatwebsite',
    ],
    'creator'    => 'Trương Thanh Tùng',
    'export'     => [

        /*
        |--------------------------------------------------------------------------
        | PDF Settings
        |--------------------------------------------------------------------------
        */
        'pdf'                         => [

            /*
            |--------------------------------------------------------------------------
            | PDF Drivers
            |--------------------------------------------------------------------------
            | Supported: DomPDF, tcPDF, mPDF
            */
            'driver'  => 'DomPDF',

            /*
            |--------------------------------------------------------------------------
            | PDF Driver settings
            |--------------------------------------------------------------------------
            */
            'drivers' => [

                /*
                |--------------------------------------------------------------------------
                | DomPDF settings
                |--------------------------------------------------------------------------
                */
                'DomPDF' => [
                    'path' => base_path('vendor/dompdf/dompdf/')
                ],

                /*
                |--------------------------------------------------------------------------
                | tcPDF settings
                |--------------------------------------------------------------------------
                */
                'tcPDF'  => [
                    'path' => base_path('vendor/tecnick.com/tcpdf/')
                ],

                /*
                |--------------------------------------------------------------------------
                | mPDF settings
                |--------------------------------------------------------------------------
                */
                'mPDF'   => [
                    'path' => base_path('vendor/mpdf/mpdf/')
                ],
            ]
        ]
    ],
    'import'     => [

        /*
        |--------------------------------------------------------------------------
        | Has heading
        |--------------------------------------------------------------------------
        |
        | The sheet has a heading (first) row which we can use as attribute names
        |
        | Options: true|false|slugged|slugged_with_count|ascii|numeric|hashed|trans|original
        |
        */

        'heading'                 => 'slugged',

        /*
        |--------------------------------------------------------------------------
        | First Row with data or heading of data
        |--------------------------------------------------------------------------
        |
        | If the heading row is not the first row, or the data doesn't start
        | on the first row, here you can change the start row.
        |
        */

        'startRow'                => 1,

        /*
        |--------------------------------------------------------------------------
        | Cell name word separator
        |--------------------------------------------------------------------------
        |
        | The default separator which is used for the cell names
        | Note: only applies to 'heading' settings 'true' && 'slugged'
        |
        */

        'separator'               => '_',

        /*
        |--------------------------------------------------------------------------
        | Include Charts during import
        |--------------------------------------------------------------------------
        */

        'includeCharts'           => false,

        /*
        |--------------------------------------------------------------------------
        | Sheet heading conversion
        |--------------------------------------------------------------------------
        |
        | Convert headings to ASCII
        | Note: only applies to 'heading' settings 'true' && 'slugged'
        |
        */

        'to_ascii'                => true,

        /*
        |--------------------------------------------------------------------------
        | Import encoding
        |--------------------------------------------------------------------------
        */

        'encoding'                => [

            'input'  => 'UTF-8',
            'output' => 'UTF-8'

        ],

        /*
        |--------------------------------------------------------------------------
        | Calculate
        |--------------------------------------------------------------------------
        |
        | By default cells with formulas will be calculated.
        |
        */

        'calculate'               => true,

        /*
        |--------------------------------------------------------------------------
        | Ignore empty cells
        |--------------------------------------------------------------------------
        |
        | By default empty cells are not ignored
        |
        */

        'ignoreEmpty'             => false,

        /*
        |--------------------------------------------------------------------------
        | Force sheet collection
        |--------------------------------------------------------------------------
        |
        | For a sheet collection even when there is only 1 sheets.
        | When set to false and only 1 sheet found, the parsed file will return
        | a row collection instead of a sheet collection.
        | When set to true, it will return a sheet collection instead.
        |
        */
        'force_sheets_collection' => false,

        /*
        |--------------------------------------------------------------------------
        | Date format
        |--------------------------------------------------------------------------
        |
        | The format dates will be parsed to
        |
        */

        'dates'                   => [

            /*
            |--------------------------------------------------------------------------
            | Enable/disable date formatting
            |--------------------------------------------------------------------------
            */
            'enabled' => true,

            /*
            |--------------------------------------------------------------------------
            | Default date format
            |--------------------------------------------------------------------------
            |
            | If set to false, a carbon object will return
            |
            */
            'format'  => false,

            /*
            |--------------------------------------------------------------------------
            | Date columns
            |--------------------------------------------------------------------------
            */
            'columns' => []
        ],

        /*
        |--------------------------------------------------------------------------
        | Import sheets by config
        |--------------------------------------------------------------------------
        */
        'sheets'                  => [

            /*
            |--------------------------------------------------------------------------
            | Example sheet
            |--------------------------------------------------------------------------
            |
            | Example sheet "test" will grab the firstname at cell A2
            |
            */

            'test' => [

                'firstname' => 'A2'

            ]

        ]
    ],

    'views'      => array(

        /*
        |--------------------------------------------------------------------------
        | Styles
        |--------------------------------------------------------------------------
        |
        | The default styles which will be used when parsing a view
        |
        */

        'styles' => [

            /*
            |--------------------------------------------------------------------------
            | Table headings
            |--------------------------------------------------------------------------
            */
            'th'     => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | Strong tags
            |--------------------------------------------------------------------------
            */
            'strong' => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | Bold tags
            |--------------------------------------------------------------------------
            */
            'b'      => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | Italic tags
            |--------------------------------------------------------------------------
            */
            'i'      => [
                'font' => [
                    'italic' => true,
                    'size'   => 12,
                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | Heading 1
            |--------------------------------------------------------------------------
            */
            'h1'     => [
                'font' => [
                    'bold' => true,
                    'size' => 24,
                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | Heading 2
            |--------------------------------------------------------------------------
            */
            'h2'     => [
                'font' => [
                    'bold' => true,
                    'size' => 18,
                ]
            ],

            /*
            |--------------------------------------------------------------------------
            | Heading 2
            |--------------------------------------------------------------------------
            */
            'h3'     => [
                'font' => [
                    'bold' => true,
                    'size' => 13.5,
                ]
            ],

            /*
             |--------------------------------------------------------------------------
             | Heading 4
             |--------------------------------------------------------------------------
             */
            'h4'     => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ]
            ],

            /*
             |--------------------------------------------------------------------------
             | Heading 5
             |--------------------------------------------------------------------------
             */
            'h5'     => [
                'font' => [
                    'bold' => true,
                    'size' => 10,
                ]
            ],

            /*
             |--------------------------------------------------------------------------
             | Heading 6
             |--------------------------------------------------------------------------
             */
            'h6'     => [
                'font' => [
                    'bold' => true,
                    'size' => 7.5,
                ]
            ],

            /*
             |--------------------------------------------------------------------------
             | Hyperlinks
             |--------------------------------------------------------------------------
             */
            'a'      => [
                'font' => [
                    'underline' => true,
                    'color'     => ['argb' => 'FF0000FF'],
                ]
            ],

            /*
             |--------------------------------------------------------------------------
             | Horizontal rules
             |--------------------------------------------------------------------------
             */
            'hr'     => [
                'borders' => [
                    'bottom' => [
                        'style' => 'thin',
                        'color' => ['FF000000']
                    ],
                ]
            ]
        ]

    )
];