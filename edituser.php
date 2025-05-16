<?php
include('head.php');
?>
<div id="updateModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[100] hidden">
  <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl mx-4">

    <div class="flex justify-between items-center bg-blue-600 text-white px-6 py-3 ">
      <h2 class="text-lg font-semibold">Update Team Details </h2>
      <button id="closeUpdateModal" class="text-2xl leading-none hover:text-gray-200">&times;</button>
    </div>


    <form class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-4" id="editUser" enctype="multipart/form-data" method="POST">
     <input type="hidden" name="userid" id="userid" >
      <div>
        <label for=" editfullName" class="block text-sm font-medium text-gray-700">Full Name<span class="text-red-500">*</span></label>
        <input type="text" id="editfullName" name="editfullName" placeholder="Enter full name"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>


      <div>
        <label for="editmobileNo" class="block text-sm font-medium text-gray-700">Mobile No<span class="text-red-500">*</span></label>
        <input type="Number" id="editmobileNo" name="editmobileNo" placeholder="Enter mobile no"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none "  pattern="^\d{10}$"/>
      </div>

      <div>
        <label for="editemail" class="block text-sm font-medium text-gray-700">Email Id<span class="text-red-500">*</span></label>
        <input type="email" id="editemail" name="editemail" placeholder="Enter email id"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="editdob" class="block text-sm font-medium text-gray-700">
          Date of Birth<span class="text-red-500">*</span>
        </label>
        <input type="date" id="editdob" name="editdob" placeholder="Select date of birth"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="editmarital_status" class="block text-sm font-medium text-gray-700">
          Marital Status<span class="text-red-500">*</span>
        </label>
        <select id="editmarital_status" name="editmarital_status"
          class="mt-1 bg-white block w-full border border-gray-300 rounded-md px-3 py-2 text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="">Select Marital Status</option>
          <option value="0">Single</option>
          <option value="1">Married</option>

        </select>
      </div>



      <div>
        <label for="editaddress" class="block text-sm font-medium text-gray-700">Address<span class="text-red-500">*</span></label>
        <input type="text" id="editaddress" name="editaddress" placeholder="Enter address"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="editrole" class="block text-sm font-medium text-gray-700">Role<span class="text-red-500">*</span></label>
        <select id="editrole" name="editrole"
          class="mt-1 bg-white block w-full border border-gray-300 rounded-md px-3 py-2 text-sm appearance-none focus:outline-none ">
          <option value="">Select Role</option>
          <option value="Admin" >Admin</option>
          <option value="User" >User</option>
        </select>
      </div>



      <div>
        <label for="editdesignation" class="block text-sm font-medium text-gray-700">Designation<span class="text-red-500">*</span></label>
        <input type="edittext" name="editdesgination" id="editdesignation" placeholder="Enter designation"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="editgender" class="block text-sm font-medium ">Gender<span class="text-red-500">*</span></label>
        <select id="editgender" name="editgender"
          class="mt-1 bg-white block w-full border  rounded-md px-3 py-2 text-sm appearance-none focus:outline-none ">
          <option value="male">Male</option>
          <option value="female">Female</option>
          
        </select>
      </div>

      <div class="md:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Upload Logo</label>
        <input type="file" name="editlogo_path"
          class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-gray-100 file:text-gray-700
                      hover:file:bg-gray-200" />
      </div>

      <div class="md:col-span-1">
        <label for="editstatus" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="editstatus" name="editstatus"
          class="mt-1 bg-white block w-full border border-gray-300 rounded-md px-3 py-2 text-sm appearance-none focus:outline-none ">
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>


      <div class="md:col-span-2 text-left">
        <button type="submit"
          class="mt-4 px-6 py-2 bg-black text-white rounded-md ">
          Update
        </button>
      </div>
    </form>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('editUser');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      try {
        const res = await fetch('api/edituser.php', {
          method: 'POST',
          body: formData
        });

        const json = await res.json();

        if (!res.ok || json.error) {
          alert('Error: ' + (json.error || res.statusText));
        } else {
          alert('Successfully added');
          form.reset();
        }
      } catch (err) {
        console.error(err);
        alert('Upload failed');
      }
    });
  });
  </script>
