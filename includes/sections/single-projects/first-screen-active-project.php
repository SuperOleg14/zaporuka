<?php
$project_id = get_the_ID();
$url = urlencode(get_permalink());
$title = urlencode(get_the_title());

$project_type = get_field('single_project_type');
$total_amount = get_field('total-amount', $project_id);
$total_collected = get_field('total-collected', $project_id);

if ($total_collected > $total_amount) {
    $total_collected = $total_amount;
}

$percent = 0;
if ($total_amount > 0) {
    $percent = round(($total_collected / $total_amount) * 100, 1);
}
?>
<div class="first-display-single-project first-display-active-project mb-150">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-display__content d-flex --just-space f-wrap">
            <div class="first-display__wrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="first-display__image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
                <div class="info info-active-project">
                    <div class="info-active-project__date">
                        <?php
                        $project_type = get_field('single_project_type');
                        $completed_date = get_field('project_completed_date');
                        if ($project_type === 'active') {
                            echo 'Розпочато: ' . get_the_date('d.m.Y');
                        }

                        if ($project_type === 'completed' && $completed_date) {
                            $formatted_date = date_i18n('d.m.Y', strtotime($completed_date));
                            echo 'Завершено: ' . $formatted_date;
                        }
                        ?>
                    </div>
                    <div class="info__text text">
                        <?php echo get_sub_field( 'active_project_text'); ?>
                    </div>
                    <div class="result__content">
                        <?php if ( have_rows( 'active_project_info_block') ): ?>
                            <?php while ( have_rows( 'active_project_info_block') ) : the_row(); ?>
                                <div class="about-volunteering__content_item">
                                    <div class="d-flex --align-center">
                                        <?php echo get_sub_field( 'active_project_info_icon'); ?>
                                        <div class="about-volunteering__content_title">
                                            <?php echo get_sub_field( 'active_project_info_title'); ?>
                                        </div>
                                    </div>
                                    <div class="about-volunteering__content_text">
                                        <?php echo get_sub_field( 'active_project_info_text'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="first-display__info">
                <div class="timeline">
                    <div class="timeline__progress">
                        <?= $percent ?>% з необхідних <?= $total_amount ?> UAH
                        <div class="progress">
                            <span style="width: <?= $percent ?>%;" class="progress-bar"></span>
                        </div>
                    </div>
                    <div class="timeline__total d-flex --just-space --align-stretch">
                        <div class="timeline__total_item">
                        <span>
                            Зібрано
                        </span>
                            <?= $total_collected ?>₴
                        </div>
                        <div class="timeline__total_item amount">
                        <span>
                            Ціль
                        </span>
                            <?= $total_amount ?>₴
                        </div>
                    </div>
                    <?php if ($project_type == 'active') : ?>
                        <a href="#support-block" class="btn --max-content">
                            Підтримати
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                            </svg>
                        </a>
                    <?php elseif ($project_type == 'completed') : ?>
                        <a href="<?php echo home_url('/zviti/'); ?>" class="btn --max-content">
                            Переглянути звіт
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <div class="timeline__btn d-flex --just-space --align-stretch">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php $url ?>&text=<?php $title ?>" class="btn btn-transparent" target="_blank">
                            Поширити у Facebook
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M10.116 3.5469H11.3332V1.4269C11.1232 1.39801 10.401 1.33301 9.5599 1.33301C7.8049 1.33301 6.60268 2.4369 6.60268 4.46579V6.33301H4.66602V8.70301H6.60268V14.6663H8.97712V8.70356H10.8355L11.1305 6.33356H8.97657V4.70079C8.97712 4.01579 9.16157 3.5469 10.116 3.5469Z" fill="#171717"/>
                            </svg>
                        </a>
                        <a href="#" id="project-link" class="btn btn-transparent" data-url="<?= esc_url(get_permalink()) ?>">
                            Копіювати посилання
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                <g clip-path="url(#clip0_2368_40343)">
                                    <path d="M14.9947 8.29247C16.4072 6.87997 16.4072 4.59247 14.9947 3.17997C13.7447 1.92997 11.7747 1.76747 10.3372 2.79497L10.2972 2.82247C9.93719 3.07997 9.85469 3.57997 10.1122 3.93747C10.3697 4.29497 10.8697 4.37997 11.2272 4.12247L11.2672 4.09497C12.0697 3.52247 13.1672 3.61247 13.8622 4.30997C14.6497 5.09747 14.6497 6.37247 13.8622 7.15997L11.0572 9.96997C10.2697 10.7575 8.99469 10.7575 8.20719 9.96997C7.50969 9.27247 7.41969 8.17497 7.99219 7.37497L8.01969 7.33497C8.27719 6.97497 8.19219 6.47497 7.83469 6.21997C7.47719 5.96497 6.97469 6.04747 6.71969 6.40497L6.69219 6.44497C5.66219 7.87997 5.82469 9.84997 7.07469 11.1C8.48719 12.5125 10.7747 12.5125 12.1872 11.1L14.9947 8.29247ZM2.00469 7.70747C0.592187 9.11997 0.592187 11.4075 2.00469 12.82C3.25469 14.07 5.22469 14.2325 6.66219 13.205L6.70219 13.1775C7.06219 12.92 7.14469 12.42 6.88719 12.0625C6.62969 11.705 6.12969 11.62 5.77219 11.8775L5.73219 11.905C4.92969 12.4775 3.83219 12.3875 3.13719 11.69C2.34969 10.9 2.34969 9.62497 3.13719 8.83747L5.94219 6.02997C6.72969 5.24247 8.00469 5.24247 8.79219 6.02997C9.48969 6.72747 9.57969 7.82497 9.00719 8.62747L8.97969 8.66747C8.72219 9.02747 8.80719 9.52747 9.16469 9.78247C9.52219 10.0375 10.0247 9.95497 10.2797 9.59747L10.3072 9.55747C11.3372 8.11997 11.1747 6.14997 9.92469 4.89997C8.51219 3.48747 6.22469 3.48747 4.81219 4.89997L2.00469 7.70747Z" fill="#171717"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_2368_40343">
                                        <rect width="16" height="16" fill="white" transform="translate(0.5)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php
                $project_id = get_the_ID();

                $api_url = rest_url('zaporuka/v1/transactions');

                $response = wp_remote_get($api_url);

                if (is_wp_error($response)) : ?>
                    <p>Помилка отримання донатів</p>
                <?php else:
                    $body = wp_remote_retrieve_body($response);
                    $transactions = json_decode($body, true);

                    if (is_array($transactions) && !empty($transactions)):
                        $project_transactions = array_filter($transactions, function($item) use ($project_id) {
//                            return $item['project_id'] == $project_id;
                            return is_array($item) && isset($item['project_id']) && $item['project_id'] == $project_id;

                        });

                        usort($project_transactions, function($a, $b) {
                            return strtotime($b['xdate']) - strtotime($a['xdate']);
                        });

                        $latest_transactions = array_slice($project_transactions, 0, 5);

                        if (!empty($latest_transactions)): ?>
                            <div class="last-donate">
                                <div class="custom-select">
                                    <div class="selected d-flex --just-space --align-center" id="last-donate">
                                        Останні донати <span class="select-arrow"></span>
                                    </div>
                                    <div class="last-donate__block" id="last-donate__block">
                                        <?php foreach ($latest_transactions as $transaction):
                                            $date = date('d.m.Y', strtotime($transaction['xdate']));
                                            $sum = intval($transaction['summa']);
                                            $valuta = !empty($transaction['valuta']) ? esc_html($transaction['valuta']) : 'UAH';

                                            $currency_symbol = ($valuta === 'USD') ? '$' : '₴';
                                            $name = '';
                                            if (!empty($transaction['client'])) {
                                                $name = esc_html($transaction['client']);
                                            } else {
                                                $name = 'Донор';
                                            }
                                            ?>
                                            <div class="last-donate__block_item d-flex --just-space --align-center">
                                                <div class="name --basis-3"><?= $name ?></div>
                                                <div class="date --basis-3"><?= $date ?></div>
                                                <div class="price --basis-3"><?= $sum ?> <?= $currency_symbol ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                    endif;
                endif; ?>
            </div>
        </div>
    </div>
</div>

