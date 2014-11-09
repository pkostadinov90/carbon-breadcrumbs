Carbon Breadcrumbs
==================

A basic WordPress plugin for breadcrumbs with advanced capabilities for extending.
Provides the theme and plugin developers an easy way to build and implement highly customizable breadcrumb functionality, specifically tailored to their needs.

- - -

Usage & Examples
------

#### Simple

The following example is the most basic way to display a breadcrumb trail, using the default options.
	
    <?php Carbon_Breadcrumb_Trail::output(); ?>

#### Simple with configuration options

The following example will display a breadcrumb trail with the `/` character between the items.

	<?php
    Carbon_Breadcrumb_Trail::output(array(
    	'glue' => ' / ', // glue between breadcrumb items
    ));
    ?>

#### Advanced

The following example will create an empty breadcrumb trail, providing you the option to set it up yourself with your preferred configuration.

	<?php
	$trail = new Carbon_Breadcrumb_Trail(); // initialize trail
	$trail->set_glue(''); // setup glue between breadcrumb items
	$trail->set_link_before('<li>'); // setup HTML before each link
	$trail->set_link_after('</li>'); // setup HTML after each link
	$trail->set_wrapper_before('<ul>'); // setup HTML before the breadcrumb trail
	$trail->set_wrapper_after('</ul>'); // setup HTML after the breadcrumb trail
	$trail->set_min_items(1); // setup the minimum number of items to display the trail
	$trail->set_home_item_title('Site Home'); // setup the title of the home page item (if not using `page_on_front`)
	$trail->setup(); // setup the trail by generating necessary breadcrumb items
	$trail->render(); // display the breadcrumb trail
    ?>

- - -

Carbon_Breadcrumb_Trail - Configuration Options
------

The following options can be passed to the `Carbon_Breadcrumb_Trail()` or `Carbon_Breadcrumb_Trail::output()` - whichever you use.

#### glue

_(string). Default: **' &gt; '**_.

The HTML, displayed between the breadcrumb items.

#### link_before

_(string). Default: **''** (none)_.

The HTML before the `<a>` link of each of the breadcrumb items.

#### link_after

_(string). Default: **''** (none)_.

The HTML after the `<a>` link of each of the breadcrumb items.

#### wrapper_before

_(string). Default: **''** (none)_.

The HTML before all breadcrumb items.

#### wrapper_after

_(string). Default: **''** (none)_.

The HTML after all breadcrumb items.

#### title_before

_(string). Default: **''** (none)_.

The HTML displayed before the breadcrumb item title.

#### title_after

_(string). Default: **''** (none)_.

The HTML displayed after the breadcrumb item title.

#### min_items

_(int). Default: **2**_.

The minimum number of breadcrumb items, required to display the trail.

#### last\_item_link

_(bool). Default: **true**_.

Whether the last item will be a link or not.

#### display\_home_item

_(bool). Default: **true**_.

Whether the **Home** breadcrumb item should be displayed or not.

#### home\_item_title

_(string). Default: **Home**_.

The title of the home item, if there is no page specified as `page_on_front`.