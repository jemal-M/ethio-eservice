import React from 'react'
import type { BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/app-layout';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit User',
        href: 'edit_user',
    },
];
export const Edit = () => {
  return (
    <AppLayout breadcrumbs={breadcrumbs}>

    <div>Edit</div>
    </AppLayout>
  )
}
