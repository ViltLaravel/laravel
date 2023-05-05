<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'etrabaho | Pilar', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Online Marketplace for Talents', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['jobportal'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
    /*
     * The default configurations to be used by the opengraph generator.
     */
    'defaults' => [
        'title'       => 'eTrabaho | Pilar - Online Marketplace for Talents',
        'description' => 'Find top talent or post jobs for free in Pilar, Bohol. Work with trusted local freelancers and professionals.',
        'url'         => null,
        'type'        => 'website',
        'site_name'   => 'eTrabaho | Pilar',
        'images'      => ['https://media.istockphoto.com/id/1453843862/photo/business-meeting.jpg?b=1&s=170667a&w=0&k=20&c=6R54FDDBB-mZHOxT_n1hDa9ow_ExC3gqbChGNKvRVhE='],
    ],
],

    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
