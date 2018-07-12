<?php get_header(); ?>
<div id="demo">
    <div id="data-container"></div>
</div>

<script>
    function simpleTemplating(data) {
        var html = '<div>';
        jQuery.each(data, function (index, item) {
            html += '<article class="post type-post status-publish format-standard hentry">';
            html += '<header class="entry-header">';
            html += '<h2 class="alpha entry-title">';
            html += '<a href="' + item.link + '" rel="bookmark">';
            html += item.title.rendered;
            html += '</a>'
            html += '</h2>'
            html += '</header>';
            html += '<div class="entry-content">';
            html += item.content.rendered;
            html += '</div>';
            html += '<aside class="entry-meta">';
            html += '<a href="' + item.link + '" rel="bookmark">';
            html += item.link;
            html += '</a>'
            html += '</aside>';
            html += '</article>';
        });
        html += '</div>';
        return html;
    }
    jQuery('#demo').pagination({
        dataSource: '<?php echo $url; ?>',
        locator: 'items',
        totalNumber: 20,
        pageSize: 5,
        ajax: {
            beforeSend: function () {
                dataContainer.html('Loading data from api...');
            }
        },
        callback: function (data, pagination) {
            var html = simpleTemplating(data);
            jQuery('#data-container').html(html);
        }
    })
</script>
<?php get_footer(); ?>




