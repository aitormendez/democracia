module.exports = {
    home: true,
    title: 'Democracia. Manual de uso web',
    themeConfig: {
        logo: '/logo-pos.png',
        nav: [
            {text: 'Democracia', link: 'https://democracia.com.es'}
        ],
        sidebar: [
            {
                title: 'Contenido',
                collapsable: false,
                children: [
                '/',
                'front-page',
                ]
            },
        ]
    }
}