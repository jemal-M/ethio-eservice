import React, { useEffect, useState } from 'react'
import type { BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/app-layout';
import { Table } from 'lucide-react';
import axios from 'axios';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Region',
        href: '/regions',
    },
];
export const Index = () => {
    const [regions,setRegions]=useState();
    useEffect(()=>{
    axios.get('/regions').then((res)=>{
      setRegions(res.data);
    })
    },[])
  return (
     <AppLayout breadcrumbs={breadcrumbs}>
    <div>
        <h1>List Of Regions</h1>
     <Table>
            <TableRow>
                <TableHeader>Id</TableHeader>
                <TableHeader>Name</TableHeader>
                <TableHeader>Actions</TableHeader>
            </TableRow>
           {regions.map((region)=>(

            <TableRow>
                    <TableCell>{region.id+1}</TableCell>
                    <TableCell>{region.name}</TableCell>
                    <TableCell>
                        <button>Edit</button>
                        <button>Delete</button>
                    </TableCell>
            </TableRow>
           ))}
     </Table>
    </div>
    </AppLayout>
  )
}
