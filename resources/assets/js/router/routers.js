export default [
    {
        path: '/', component:resolve=>require(['../view/home'],resolve),
        children:[
            {
                path: '/', component:resolve=>require(['../components/Hello'],resolve)
            },
            {
                path: '/test', component:resolve=>require(['../view/menu/list'],resolve)
            },
            {
                path: '/hello', component:resolve=>require(['../components/Hello'],resolve)
            },
        ]
    },
    {
        path: '/login', component:resolve=>require(['../view/login'],resolve)
    },
    {
        path: '/register', component:resolve=>require(['../view/register'],resolve)
    }
];