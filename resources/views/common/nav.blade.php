<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <a class="navbar-brand" href="#">Title</a>
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Link</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li>
                <?=link_to_action('ArticlesController@show',$latest->title,[$latest->id])?>
            </li>
        </ul>
    </div>
</nav>