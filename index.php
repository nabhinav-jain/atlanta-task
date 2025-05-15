<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link href="style.css" rel="stylesheet" />
   
</head>
<body class="bg-gray-100 font-inter">
    <div class="container  ">

        <div class="flex justify-between items-center mb-8 bg-blue-900 header w-[100vw] h-[20vh] px-[5vw] z-{0}" >
            <div class="flex flex-col text-white ml-[5vh]">
            <h1 class="text-2xl font-semibold ">Team</h1>
            <p><pre>Dashboard     All Teams</pre></p>
            </div>
            <div class="flex gap-4 mr-[5vh]">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <i class="bi bi-plus"></i>

                    Add
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <i class="bi bi-funnel"></i>

                    Filter
                </button>
            </div>
        </div>

        <div class="table container bg-white w-[75vw] mx-auto z-{2} mt-[-8vh] shadow-md rounded-sm p-2">
        <div class="bg-white  rounded-lg p-4 mb-6">
            <div class="flex items-center  justify-between ">
                <div class="flex items-center ">
                    <select id="perPage" class="w-[10vw] border rounded-md py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="w-[20%]">
                    <input type="text" placeholder="Search..." class=" border border-blue-300  rounded-md  outline-none ring-blue-500">
                </div>
            </div>
     
            <table class="min-w-full divide-y divide-gray-200 mt-3">
                <thead class="">
                    <tr class="bg-blue-500 text-white">
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Mobile</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">DOB</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Designation</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Married Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Photo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider custom-table-header">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">HIMANSHU ARORA</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">8686869337</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">TESTING@GMAIL.COM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">ADMIN</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">ADMIN</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/40" alt="User Avatar" class="h-8 w-8 rounded-full">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs font-semibold">Active</span>
                             <div class="text-xs text-gray-500">08/12/2020 13:24:12</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex gap-2">
                                 <button class="text-blue-500 hover:text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/><path d="M15 5l2 2"/></svg>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">GOBUZY TEAM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">7777878718</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">CARE@GOBUZY.COM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">DESIGNER</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">DEVELOPER</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex items-center">
                                 <img src="https://via.placeholder.com/40" alt="User Avatar" class="h-8 w-8 rounded-full">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs font-semibold">Active</span>
                            <div class="text-xs text-gray-500">03/10/2019 20:11:11</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex gap-2">
                                <button class="text-blue-500 hover:text-blue-700">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/><path d="M15 5l2 2"/></svg>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-center mt-4">
            <p class="text-sm text-gray-700">Showing 1 to 2 of 2 entries</p>
            <div class="flex gap-2">
                <button class="bg-white border border-green-500 rounded-md py-2 px-3 text-sm text-gray-700 hover:bg-gray-100">Previous</button>
                <button class="bg-green-500 text-white rounded-md py-2 px-3 text-sm font-semibold">1</button>
                <button class="bg-white border border-green-500 rounded-md py-2 px-3 text-sm text-gray-700 hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
    </div>
 
</body>
</html>
