import profile from "../frontend/profile.vue";
import pageNotFound from "../views/pageNotFound.vue";
import frontendLayouts from "../frontend/layouts/frontendLayouts.vue";
import previewData from "../frontend/previewData.vue";


const routes = [
    {
        path: '/auth/',
        component: frontendLayouts,
        children: [
            {path: '404', name: '404', component: pageNotFound},
            {
                path: '/auth/profile', name: 'profile', component: profile,
                meta: {
                    dataUrl: 'auth/user_profile',
                    pageTitle: 'Profile'
                }
            },
            {
                path: '/auth/informations', name: 'informations', component: profile,
                meta: {
                    dataUrl: 'auth/user_profile',
                    pageTitle: 'Profile'
                }
            },
        ]
    },
    {path: '*', redirect: '/404'},

];

export default routes;
