
<?php

elgg_register_event_handler('init', 'system', function () {
    elgg_register_plugin_hook_handler('register', 'menu:owner_block', 
        function($type, $name, $menu, $params) {
            if (!$params['entity'] instanceof ElggGroup) {
                return $menu;
            };
            if (!$params['entity']->isMember()) {
                // display only to members
                return $menu;
            };

			$url = "mumble://our.mumble-server.org/open-the-channel/{$params['entity']->guid}";
            $icon = elgg_view_icon("speech-bubble-alt-hover");
            $item = new ElggMenuItem('mumble_url', $icon." ".elgg_echo('mumble:url'), $url);
            $item->addLinkClass('elgg-button elgg-button-action');
			$menu[] = $item;
            return $menu;
    });
});

