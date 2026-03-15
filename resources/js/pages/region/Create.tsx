import React,{useState} from 'react'
import type { BreadcrumbItem } from '@/types';
import AppLayout from '@/layouts/app-layout';
import axios from 'axios';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Add Users',
        href: 'create_users',
    },
];
export const Create = () => {
    const [name,setName]=useState('');
    const [isCreated,setIsCreated]=useState(false)
    const handleSubmit=(e)=>{
        e.preventDefault();
        axios.post('/regions',{name:name}).then((res)=>{
            console.log(res);
            setIsCreated(true)
            
        })

    }

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
    <div>Create User</div>

    <Form >
         <Input placeholder='Enter Name' value={name} onChange={(e)=>setName(e.target.value)}/>
         <Button onClick={handleSubmit}>Submit</Button>
    </Form>
    </AppLayout>
  )
}
