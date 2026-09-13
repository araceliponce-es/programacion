import { Head } from '@inertiajs/react';

export default function Abc() {
    return (
        <>
            <Head title="Abc" />

            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <h1 className="text-2xl font-semibold">
                    Abc
                </h1>

                <p className="text-muted-foreground">
                    This is the Abc page.
                </p>
            </div>
        </>
    );
}

//basicamente, secuencia {nivel},{subnivel},{subsubnivel},...
Abc.layout = {
    breadcrumbs: [
        // {
        //     title: 'Dashboard',
        //     href: '/dashboard',
        // },
        {
            title: 'Abc',
            href: '/abc',
        },
    ],
};

