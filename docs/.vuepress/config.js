module.exports = {
    home: true,
    title: 'Democracia. Manual del CMS',
    base: '/democracia/',
    themeConfig: {
        nav: [
            {text: 'Democracia', link: 'https://democracia.e451.net'}
        ],
        sidebar: [
            {
                title: 'Contenido',
                children: [
                '/',
                'front-page',
                'imagenes',
                'tipos-de-contenido',
                'entradas',
                ]
            },
        ]
    }
}