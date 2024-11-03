import profile from "../frontend/profile.vue";
import pageNotFound from "../views/pageNotFound.vue";
import frontendLayouts from "../frontend/layouts/frontendLayouts.vue";
import dashboard from "../frontend/dashboard.vue";
import selfInformation from "../frontend/selfInformation.vue";
import userEssentialInfo from "../frontend/userEssentialInfo.vue";
import userEducation from "../frontend/userEducation.vue";
import userCourseOrDiploma from "../frontend/userCourseOrDiploma.vue";
import userTraining from "../frontend/userTraining.vue";
import userExperience from "../frontend/userExperience.vue";
import userChild from "../frontend/userChild.vue";
import userNominee from "../frontend/userNominee.vue";
import userGurrantors from "../frontend/userGurrantors.vue";
import userReferencePerson from "../frontend/userReferencePerson.vue";
import userBrotherAndSister from "../frontend/userBrotherAndSister.vue";
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
                path: '/auth/informations', name: 'informations', component: selfInformation,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Personal Information',
                    nextUrl: '/auth/essential_information?data=essential',
                }
            },
            {
                path: '/auth/essential_information', name: 'essential_information', component: userEssentialInfo,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Essential Information',
                    previousUrl: '/auth/informations?data=basic',
                    nextUrl: '/auth/education_information?data=education'
                }
            },
            {
                path: '/auth/education_information', name: 'education_information', component: userEducation,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Education Information',
                    previousUrl: '/auth/essential_information?data=essential',
                    nextUrl: '/auth/course_or_information?data=course'
                }
            },
            {
                path: '/auth/course_or_information', name: 'course_or_information', component: userCourseOrDiploma,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Course Or diploma Information',
                    previousUrl: '/auth/education_information?data=education',
                    nextUrl: '/auth/training_information?data=training'
                }
            },
            {
                path: '/auth/training_information', name: 'training_information', component: userTraining,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Training Information',
                    previousUrl: '/auth/course_or_information?data=course',
                    nextUrl: '/auth/experience_information?data=experience'
                }
            },
            {
                path: '/auth/experience_information', name: 'experience_information', component: userExperience,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Experience Information',
                    previousUrl: '/auth/training_information?data=training',
                    nextUrl: '/auth/child_information?data=child'
                }
            },
            {
                path: '/auth/child_information', name: 'child_information', component: userChild,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Child Information',
                    previousUrl: '/auth/experience_information?data=experience',
                    nextUrl: '/auth/nominee_information?data=nominee'
                }
            },
            {
                path: '/auth/nominee_information', name: 'nominee_information', component: userNominee,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Nominee Information',
                    previousUrl: '/auth/child_information?data=child',
                    nextUrl: '/auth/gurantor_information?data=gurantor'
                }
            },
            {
                path: '/auth/gurantor_information', name: 'gurantor_information', component: userGurrantors,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Gurantors Information',
                    previousUrl: '/auth/nominee_information?data=nominee',
                    nextUrl: '/auth/reference_information?data=ref'
                }
            },
            {
                path: '/auth/reference_information', name: 'reference_information', component: userReferencePerson,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Reference Person',
                    previousUrl: '/auth/gurantor_information?data=gurantor',
                    nextUrl: '/auth/brother_and_sister_information?data=brs'
                }
            },
            {
                path: '/auth/brother_and_sister_information',
                name: 'brother_and_sister_information',
                component: userBrotherAndSister,
                meta: {
                    dataUrl: 'auth/staff_information',
                    pageTitle: 'Brother and Sister Information',
                    previousUrl: '/auth/reference_information?data=ref',
                    nextUrl: null,
                    isLast: 1
                }
            },
            {
                path: '/auth/preview/:employee_id', name: 'pim_preview', component: previewData,
                meta: {
                    dataUrl: 'api/pim/pre_view_employee',
                    pageTitle: 'Preview'
                }
            },
        ]
    },
    {path: '*', redirect: '/404'},

];

export default routes;
