<div class="cf_box">
    <div class="box__container">
        <div class="meta-options cf_field cf_pic">
            <div class="cf_foto"> 
                <div class="foto__container" >
                    <img class= "img-div" id="img-div" width="150" src="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cf-image', true ) ); ?>" alt="">
                </div>
                <?php            
                    echo '<tr>';
                    echo '<td style="vertical-align: top; background: #f6f6f6; padding: 5px 10px;">';
                        echo '<div class="cf_buttons">';
                        echo '<div class="cf_button"><a href="#" class="button button-secondary wpar_upload_image_button">'. __( 'Upload Image', 'your-textdomain' ) .'</a></div>';   
                        echo '<div class="cf_button"><input class="button" type="button" value="Delete" id="Delete" onClick="del_click()"></div>';
                        echo '</div>';
                    echo '</td>';
                    echo '<td>';
                        $cf_image = get_post_meta( $post->ID, '_cf-image', true );
                        ?>
                        <input type="hidden" id="cf-image" name="cf-image" style="width:100%;" readonly="readonly" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cf-image', true ) ); ?>">
                        <?php                
                        echo '<p style="font-size: 90%; color: #777777;">Upload the product image</p>';   
                        if( strlen($cf_image) > 0 ) {
                            echo '<img src="'. esc_url($cf_image).'" style="width: 500px; border: 1px solid #999999;">';
                        }        
                    echo '</td>';
                    echo '</tr>';
                ?>  
            </div>            
        </div>
        
        <div class="meta-options cf_field cf_published_date">
            <div><label for="cf_published_date">Published Date</label></div>
            <div><input id="cf_published_date"
                    type="date"
                    name="cf_published_date"
                    value="<?php echo get_the_date('Y-m-d'); ?>"
                    >
            </div>
        </div>

        <div class="meta-options cf_field cf_type">
            <?php
                $default = esc_attr( get_post_meta( get_the_ID(), 'cf_type', true ) );
                $options = ["rare", "frequent", "unusual"];                
            ?>
            <div><label for="cf_type">Type</label></div>
            <div>
                <select id="cf_type" name="cf_type">            
                    <option value="rare" <?php if($default == $options[0]){echo("selected");}?> >rare</option>
                    <option value="frequent" <?php if($default == $options[1]){echo("selected");}?> >frequent</option>
                    <option value="unusual" <?php if($default == $options[2]){echo("selected");}?>>unusual</option>
                </select>
            </div>            
        </div>
    </div>
    <div class="cf_buttons">
        <div class="cf_button"><input class="button" type="button" value="Update" onClick="update_click()"></div>
        <div class="cf_button"><input class="button" type="button" value="Clear all" id="clear-all" onClick="clear_all()"></div>            
    </div>
</div>
