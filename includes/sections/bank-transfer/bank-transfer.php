<?php
$accountRaiffeisen = [
    [
        'title' => 'Банк одержувача',
        'text' => '"Райффайзен Банк Аваль" у м. Київ'
    ],
    [
        'title' => 'IBAN',
        'text' => 'UA293808050000000026005552959'
    ],
    [
        'title' => 'Код ЄДРПОУ',
        'text' => '35911054'
    ],
    [
        'title' => 'Код банку (МФО)',
        'text' => '380805'
    ],
    [
        'title' => 'Одержувач',
        'text' => 'БФ "Запорука"'
    ],
    [
        'title' => 'Призначення платежу',
        'text' => 'Благодійна пожертва'
    ]
];
    $accountPrivat = [
        [
            'title' => 'Банк одержувача',
            'text' => 'ПАТ "Приват Банк"'
        ],
        [
            'title' => 'IBAN',
            'text' => 'UA433052990000026006015009297'
        ],
        [
            'title' => 'Код ЄДРПОУ',
            'text' => '35911054'
        ],
        [
            'title' => 'Код банку (МФО)',
            'text' => '320649'
        ],
        [
            'title' => 'Одержувач',
            'text' => 'БФ "Запорука"'
        ],
        [
            'title' => 'Призначення платежу',
            'text' => 'Благодійна пожертва'
        ],
        [
            'title' => 'Карта фонду',
            'text' => '5169 3305 1816 6852 (Оніпко Н.О.)'
        ]
    ];
    $accountDollars = [
        [
            'title' => 'IBAN',
            'text' => 'UA473003350000000026007552968'
        ],
        [
            'title' => 'Beneficiary',
            'text' => 'Charitable Foundation Zaporuka'
        ],
        [
            'title' => 'Address',
            'text' => '03022, UKRAINE, Kiev, Kyiv city, Vasylkivska str, 30'
        ],
        [
            'title' => 'Details of payment',
            'text' => 'Field №70 or №72 - charitable donation'
        ],
        [
            'title' => 'Bank of beneficiary',
            'text' => 'RAIFFEISEN BANK JOINT STOCK COMPANY,KYIV, UKRAINE'
        ],
        [
            'title' => 'SWIFT Code',
            'text' => 'AVALUAUKXXX'
        ],
        [
            'title' => 'Correspondent bank',
            'text' => 'THE BANK OF NEW YORK MELLON, NEW YORK,NY, UNITED STATES OF AMERICA'
        ],
        [
            'title' => 'SWIFT Code',
            'text' => 'IRVTUS3NXXX'
        ],
        [
            'title' => 'Correspondent account',
            'text' => '8900260688'
        ]
    ];
    $accountEuro = [
    [
        'title' => 'IBAN',
        'text' => 'UA153003350000000026003552973'
    ],
    [
        'title' => 'Beneficiary',
        'text' => 'Charitable Foundation Zaporuka'
    ],
    [
        'title' => 'Address',
        'text' => '03022, UKRAINE, Kiev, Kyiv city, Vasylkivska str, 30'
    ],
    [
        'title' => 'Details of payment',
        'text' => 'Сharitable donation'
    ],
    [
        'title' => 'Bank of beneficiary',
        'text' => 'RAIFFEISEN BANK JOINT STOCK COMPANY, KYIV, UKRAINE'
    ],
    [
        'title' => 'SWIFT Code',
        'text' => 'AVALUAUKXXX'
    ],
    [
        'title' => 'Intermediary bank',
        'text' => 'RAIFFEISEN BANK INTERNATIONAL AG, VIENNA, AUSTRIA'
    ],
    [
        'title' => 'SWIFT Code',
        'text' => 'RZBAATWWXXX'
    ],
    [
        'title' => 'Correspondent account',
        'text' => '55022305'
    ]
];
    $accountGBR = [
    [
        'title' => 'IBAN',
        'text' => 'UA393003350000000026005775587'
    ],
    [
        'title' => 'Beneficiary',
        'text' => 'Charitable Foundation Zaporuka'
    ],
    [
        'title' => 'Address',
        'text' => '03022, UKRAINE, Kiev, Kyiv city, Vasylkivska str, 30'
    ],
    [
        'title' => 'Details of payment',
        'text' => 'Сharitable donation'
    ],
    [
        'title' => 'Bank of beneficiary',
        'text' => 'RAIFFEISEN BANK JOINT STOCK COMPANY, KYIV, UKRAINE'
    ],
    [
        'title' => 'SWIFT Code',
        'text' => 'AVALUAUKXXX'
    ],
    [
        'title' => 'Intermediary bank',
        'text' => 'BARCLAYS BANK PLC, LONDON, UNITED KINGDOM'
    ],
    [
        'title' => 'SWIFT Code',
        'text' => 'BARCGB22XXX'
    ],
    [
        'title' => 'Correspondent account',
        'text' => '83301931'
    ]
]

?>

<div class="support-main mb-150">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <h1 class="main-title"><?php the_title() ?></h1>
        <div class="support-block d-flex">
            <div class="donation-wrapper">
                <div class="donation-container grey-block">
                    <div class="donation-container__item">
                        <div class="donation-container__title">Рахунок у гривнях (UAH)</div>
                        <div class="donation-container__block copy-block">
                            <?php foreach ($accountRaiffeisen as $item) : ?>
                                <div class="donation-container__block_item copy-item d-flex --align-center --just-space">
                                    <div class="d-flex --max-content donation-container__block_info">
                                        <div class="copy-title"><?= $item['title']; ?></div>
                                        <div class="copy-text"><?= $item['text']; ?></div>
                                    </div>
                                    <div class="copy-text-btn d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="btn btn-transparent btn-content copy-all">
                                Копіювати все
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="donation-container__item">
                        <div class="donation-container__block copy-block">
                            <?php foreach ($accountPrivat as $item) : ?>
                                <div class="donation-container__block_item copy-item d-flex --align-center --just-space">
                                    <div class="d-flex --max-content donation-container__block_info">
                                        <div class="copy-title"><?= $item['title']; ?></div>
                                        <div class="copy-text"><?= $item['text']; ?></div>
                                    </div>
                                    <div class="copy-text-btn d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="btn btn-transparent btn-content copy-all">
                                Копіювати все
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="donation-container grey-block">
                    <div class="donation-container__item">
                        <div class="donation-container__title">Рахунок в американських доларах (USD)</div>
                        <div class="donation-container__block copy-block">
                            <?php foreach ($accountDollars as $item) : ?>
                                <div class="donation-container__block_item copy-item d-flex --just-space">
                                    <div class="d-flex --max-content donation-container__block_info">
                                        <div class="copy-title"><?= $item['title']; ?></div>
                                        <div class="copy-text"><?= $item['text']; ?></div>
                                    </div>
                                    <div class="copy-text-btn d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="btn btn-transparent btn-content copy-all">
                                Копіювати все
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="donation-container grey-block">
                    <div class="donation-container__item">
                        <div class="donation-container__title">Рахунок в євро (EUR)</div>
                        <div class="donation-container__block copy-block">
                            <?php foreach ($accountEuro as $item) : ?>
                                <div class="donation-container__block_item copy-item d-flex --just-space">
                                    <div class="d-flex --max-content donation-container__block_info">
                                        <div class="copy-title"><?= $item['title']; ?></div>
                                        <div class="copy-text"><?= $item['text']; ?></div>
                                    </div>
                                    <div class="copy-text-btn d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="btn btn-transparent btn-content copy-all">
                                Копіювати все
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="donation-container grey-block">
                    <div class="donation-container__item">
                        <div class="donation-container__title">Рахунок в євро (EUR)</div>
                        <div class="donation-container__block copy-block">
                            <?php foreach ($accountGBR as $item) : ?>
                                <div class="donation-container__block_item copy-item d-flex --just-space">
                                    <div class="d-flex --max-content donation-container__block_info">
                                        <div class="copy-title"><?= $item['title']; ?></div>
                                        <div class="copy-text"><?= $item['text']; ?></div>
                                    </div>
                                    <div class="copy-text-btn d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="btn btn-transparent btn-content copy-all">
                                Копіювати все
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.5 12.8125H8.75C8.44063 12.8125 8.1875 12.5594 8.1875 12.25V3.25C8.1875 2.94062 8.44063 2.6875 8.75 2.6875H13.6754L16.0625 5.07461V12.25C16.0625 12.5594 15.8094 12.8125 15.5 12.8125ZM8.75 14.5H15.5C16.741 14.5 17.75 13.491 17.75 12.25V5.07461C17.75 4.62812 17.5707 4.19922 17.2543 3.88281L14.8707 1.4957C14.5543 1.1793 14.1254 1 13.6789 1H8.75C7.50898 1 6.5 2.00898 6.5 3.25V12.25C6.5 13.491 7.50898 14.5 8.75 14.5ZM4.25 5.5C3.00898 5.5 2 6.50898 2 7.75V16.75C2 17.991 3.00898 19 4.25 19H11C12.241 19 13.25 17.991 13.25 16.75V15.625H11.5625V16.75C11.5625 17.0594 11.3094 17.3125 11 17.3125H4.25C3.94062 17.3125 3.6875 17.0594 3.6875 16.75V7.75C3.6875 7.44063 3.94062 7.1875 4.25 7.1875H5.375V5.5H4.25Z" fill="#171717"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('includes/modules/bank-options'); ?>
        </div>
    </div>
</div>
