<?php if(is_single()){ // 投稿記事 ?>
<meta property='og:type' content='article'>
<meta property='og:title' content='<?php the_title() ?> | <?php bloginfo('name'); ?>'>
<meta property='og:url' content='<?php the_permalink() ?>'>
<meta property='og:description' content='<?php echo get_ogp_txt($post->post_content); ?>'>
<?php } else { //ホーム・カテゴリー・固定ページなど ?>
<meta property='og:type' content='website'>
<meta property='og:title' content='<?php bloginfo('name'); ?>'>
<meta property='og:url' content='<?php echo home_url('/') ?>'>
<meta property='og:description' content='<?php bloginfo('description') ?>'>
<? } ?>
<meta property='og:site_name' content='<?php bloginfo('name'); ?>'>
<?php
  if (is_single() or is_page()){//投稿記事か固定ページ
    if (has_post_thumbnail()){//アイキャッチがある場合
       $image_id = get_post_thumbnail_id();
       $image = wp_get_attachment_image_src($image_id, 'full');
       echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
    } elseif( preg_match( '/<img.*?src=(["\'])(.+?)\1.*?>/i', $post->post_content, $imgurl ) && !is_archive()) {//アイキャッチ以外の画像がある場合
       echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
    } else {//画像が1つも無い場合
       echo '<meta property="og:image" content="http://brooklyn-fukuoka.com/assets/img/common/ogp_lotus.png">';echo "\n";
    }
  } else { //ホーム・カテゴリーページなど
     echo '<meta property="og:image" content="http://brooklyn-fukuoka.com/assets/img/common/ogp_lotus.png">';echo "\n";
  }
?>
<meta property="fb:app_id" content="415826318570506" >
