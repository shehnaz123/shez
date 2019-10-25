<div id="wrap">
    <h1>About MRK WP</h1>
    <h3>Who we are</h3>
    <p>We are a global team of web developers who fell in love with the WordPress some years ago. In particular we love Divi Builder and Gutenberg because it allows us to deliver great results to our customers in a short amount of time.</p>

    <h3>Why MRKWP?</h3>
    <p>
        We began building our own custom modules, child themes and Divi plugins to allow us to do more with the Divi Builder and WordPress. All of these we use on our own websites. In The spirit of GPL we released all our various products.
    </p>

    <hr>

    <h1 id='product-dependencies'>Download Dependencies</h1>
    <?php if (!empty($dependencies)) : ?>
        <?php $iter = 0; ?>
        <?php foreach ($dependencies as $dependency): ?>
             <p>
                 * <a href="<?php echo $dependency['url']; ?>" target="_blank"><?php echo $dependency['name']; ?></a>
             </p>
        <?php endforeach ?> 
    <?php else: ?>
        <p>There are no dependencies for the activated mrkwp plugins.</p>
    <?php endif ?>
</div>