<?php
include('head.php');
?>
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[100] hidden">
  <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl mx-4">

    <div class="flex justify-between items-center bg-blue-600 text-white px-6 py-3 ">
      <h2 class="text-lg font-semibold">Create New Account</h2>
      <button id="closeModal" class="text-2xl leading-none hover:text-gray-200">&times;</button>
    </div>


    <form class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-4" id="addUser" enctype="multipart/form-data" method="POST">

      <div>
        <label for=" fullName" class="block text-sm font-medium text-gray-700">Full Name<span class="text-red-500">*</span></label>
        <input type="text" id="fullName" name="fullName" placeholder="Enter full name"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>


      <div>
        <label for="mobileNo" class="block text-sm font-medium text-gray-700">Mobile No<span class="text-red-500">*</span></label>
        <input type="tel" id="mobileNo" name="mobileNo" placeholder="Enter mobile no" maxlength="10" pattern="^\d{10}$" required class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none" oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10);" />

      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Id<span class="text-red-500">*</span></label>
        <input type="email" id="email" name="email" placeholder="Enter email id"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="dob" class="block text-sm font-medium text-gray-700">
          Date of Birth<span class="text-red-500">*</span>
        </label>
        <input type="date" id="dob" name="dob" placeholder="Select date of birth"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div id="marital_status" class="mt-1">
        <label class="block text-sm font-medium text-gray-700">
          Marital Status<span class="text-red-500">*</span>
        </label>

        <div class="mt-1 flex space-x-6">
          <label class="inline-flex items-center">
            <input
              type="radio"
              name="marital_status"
              value="single"
              class="form-radio text-blue-600" />
            <span class="ml-2 text-sm">Single</span>
          </label>

          <label class="inline-flex items-center">
            <input
              type="radio"
              name="marital_status"
              value="married"
              class="form-radio text-blue-600" />
            <span class="ml-2 text-sm">Married</span>
          </label>
        </div>
      </div>




      <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Address<span class="text-red-500">*</span></label>
        <input type="text" id="address" name="address" placeholder="Enter address"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="role" class="block text-sm font-medium text-gray-700">Role<span class="text-red-500">*</span></label>
        <select id="role" name="role"
          class="mt-1 bg-white block w-full border border-gray-300 rounded-md px-3 py-2 text-sm appearance-none focus:outline-none ">
          <option value="">Select Role</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
      </div>



      <div>
        <label for="designation" class="block text-sm font-medium text-gray-700">Designation<span class="text-red-500">*</span></label>
        <input type="text" name="desgination" id="designation" placeholder="Enter designation"
          class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none " />
      </div>

      <div>
        <label for="gender" class="block text-sm font-medium ">Gender<span class="text-red-500">*</span></label>
        <select id="gender" name="gender"
          class="mt-1 bg-white block w-full border  rounded-md px-3 py-2 text-sm appearance-none focus:outline-none ">
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
      </div>

      <div class="md:col-span-1">
        <label class="block text-sm font-medium text-gray-700">Upload Logo</label>
        <input type="file" name="logo_path"
          class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-gray-100 file:text-gray-700
                      hover:file:bg-gray-200" />
      </div>

      <div class="md:col-span-1">
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status" name="status"
          class="mt-1 bg-white block w-full border border-gray-300 rounded-md px-3 py-2 text-sm appearance-none focus:outline-none ">
          <option>Active</option>
          <option>Inactive</option>
        </select>
      </div>


      <div class="md:col-span-2 text-left">
        <button type="submit"
          class="mt-4 px-6 py-2 bg-black text-white rounded-md ">
          Add Team
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addUser');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      try {
        const res = await fetch('api/adduser.php', {
          method: 'POST',
          body: formData
        });

        const json = await res.json();

        if (!res.ok || json.error) {
          alert('Error: ' + (json.error || res.statusText));
        } else {
          alert('Successfully added');
          form.reset();
          window.location.href = window.location.pathname;

        }
      } catch (err) {
        console.error(err);
        alert('Upload failed');
      }
    });
  });
</script>