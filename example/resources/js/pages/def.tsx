import { Head } from '@inertiajs/react';


type Props = {
    isAdmin: boolean;
};
export default function Def({ isAdmin }: Props) {
    return (
        <>
            <Head title="Def" />

            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <h1 className="text-2xl font-semibold">
                    Def
                </h1>
                {isAdmin ? (
                    <p>you are admin</p>
                ) : (
                    <p>you are not admin</p>
                )}
            </div>
        </>
    );
}

//basicamente, secuencia {nivel},{subnivel},{subsubnivel},...
Def.layout = {
    breadcrumbs: [
        // {
        //     title: 'Dashboard',
        //     href: '/dashboard',
        // },
        {
            title: 'Def',
            href: '/def',
        },
    ],
};

