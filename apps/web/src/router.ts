import { createRouter, createWebHistory, type RouteRecordRaw } from "vue-router";
import Dashboardview from "./pages/Home/Dashboard/Dashboardview.vue";
import HomeView from "./pages/Home/HomeView.vue";
import UserView from "./pages/Home/User/UserView.vue";
import LoginView from "./pages/Login/LoginView.vue";
import { useAuthStore } from "./stores/authStore";

const routes = [
    {
        path: "/",
        component: HomeView,
        name: "Home",
        redirect: () => ({ name: "Dashboard" }),
        children: [
            {
                path: "/dashboard",
                component: Dashboardview,
                name: "Dashboard",
                meta: {
                    protected: true,
                },
            },
            { path: "/users", component: UserView, name: "users", meta: { protected: true } },
        ],
    },
    { path: "/login", component: LoginView, name: "Login" },
] satisfies RouteRecordRaw[];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from) => {
    const authStore = useAuthStore();

    if (!authStore.isAuthenticated()) {
        if (to.name === "Login") {
            const hasSession = await authStore.refresh();
            if (hasSession) return { name: "Dashboard" };
        } else {
            return { name: "Login" };
        }
    }
});

export { router };
