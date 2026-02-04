import { usePage } from '@inertiajs/vue3';
import { route as ziggyRoute } from 'ziggy-js';

export function useRoute() {
    const page = usePage();

    return (name: string, params?: any, absolute?: boolean) => {
        return ziggyRoute(name, params, absolute, page.props.ziggy);
    };
}
