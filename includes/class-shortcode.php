<?php
add_shortcode('danh_sach_sinh_vien', 'sm_display_student_list');
function sm_display_student_list()
{
    $args = array(
        'post_type' => 'student',
        'posts_per_page' => -1,
        'status' => 'publish'
    );
    $query = new WP_Query($args);

    ob_start();
    ?>
    <table class="sm-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>MSSV</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Ngày sinh</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($query->have_posts()):
                $stt = 1;
                while ($query->have_posts()):
                    $query->the_post();
                    $mssv = get_post_meta(get_the_ID(), '_sm_mssv', true);
                    $lop = get_post_meta(get_the_ID(), '_sm_lop', true);
                    $ngay_sinh = get_post_meta(get_the_ID(), '_sm_ngay_sinh', true);
                    ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo esc_html($mssv); ?></td>
                        <td><?php the_title(); ?></td>
                        <td><?php echo esc_html($lop); ?></td>
                        <td><?php echo esc_html(date('d/m/Y', strtotime($ngay_sinh))); ?></td>
                    </tr>
                <?php endwhile;
                wp_reset_postdata(); else: ?>
                <tr>
                    <td colspan="5">Không có sinh viên nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
    return ob_get_clean();
}