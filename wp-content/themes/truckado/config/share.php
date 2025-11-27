<?php
    //SHARE - Links para COMPARTILHAMENTO
function linkShare($social = null,$content = null) {
    global $post;

    $postTitle = get_the_title();
    $postURL = get_permalink();

    //REDES SOCIAIS SEPARADAS COM 0 = nome e 1 = link
    $link['twitter'][0]     = 'Twitter';
    $link['twitter'][1]     = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL;
    //*
    $link['facebook'][0]    = 'Facebook';
    $link['facebook'][1]    = 'https://www.facebook.com/share.php?u='.$postURL;
    //*
    $link['google'][0]      = 'Google';
    $link['google'][1]      = 'https://plus.google.com/share?url='.$postURL;
    //*
    $link['buffer'][0]      = 'Buffer';
    $link['buffer'][1]      = 'https://bufferapp.com/add?url='.$postURL.'&amp;text='.$postTitle;
    //*
    $link['whatsapp'][0]    = 'WhatsApp';
    $link['whatsapp'][1]    = 'https://wa.me/?text='.$postTitle . ' ' . $postURL;
    //*
    $link['linkedin'][0]    = 'Linkedin';
    $link['linkedin'][1]    = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
    //*
    $link['email'][0]    = 'E-mail';
    $link['email'][1]    = 'mailto:?subject='.$postTitle.'&body='.$postTitle.' | '.$postTitle;
    //FIM DE SEÇÃO

    if($social == null) {
       if($content == null) {
        echo '<ul>';
            foreach($link as $newlink) {
                echo '<li><a href="'.$newlink[1].'" alt="'.$postTitle.'" target="_blank">'.$newlink[0].'</a></li>';
            }
        echo '</ul>';
       } else {
        echo '<ul>';
            foreach($link as $newlink) {
                echo '<li><a href="'.$newlink[1].'" alt="'.$postTitle.'" target="_blank">'.$content.'</a></li>';
            }
        echo '</ul>';
       }
    }

    //Condicionais para a exibição do link e texto
    elseif($social == 'twitter')    {echo '<a href="'.$link['twitter'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['twitter'][0];} else { echo $content;} echo '</a>';}
    elseif($social == 'facebook')   {echo '<a href="'.$link['facebook'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['facebook'][0];} else { echo $content;} echo '</a>';}
    elseif($social == 'google')     {echo '<a href="'.$link['google'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['google'][0];} else { echo $content;} echo '</a>';}
    elseif($social == 'buffer')     {echo '<a href="'.$link['buffer'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['buffer'][0];} else { echo $content;} echo '</a>';}
    elseif($social == 'whatsapp')   {echo '<a href="'.$link['whatsapp'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['whatsapp'][0];} else { echo $content;} echo '</a>';}
    elseif($social == 'linkedin')   {echo '<a href="'.$link['linkedin'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['linkedin'][0];} else { echo $content;} echo '</a>';}
    elseif($social == 'email')   {echo '<a href="'.$link['email'][1].'" alt="'.$postTitle.'" target="_blank">'; if($content == null) {echo $link['email'][0];} else { echo $content;} echo '</a>';}
    //FIM DE SEÇÃO 
}