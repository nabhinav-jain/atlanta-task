<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require('head.php');
require('appUser.php');
require('edituser.php');
?>

<body class="bg-gray-100 font-inter">
    <div class="container  ">

        <div class="flex justify-between items-center mb-8 bg-blue-900 header w-[100vw] h-[20vh] px-[5vw] z-{0}">
            <div class="flex flex-col text-white ml-[5vh]">
                <h1 class="text-2xl font-semibold ">Team</h1>
                <p>
                <pre>Dashboard    <span class="text-gray-50" >All Teams</span> </pre>
                </p>
            </div>
            <div class="flex gap-4 mr-[5vh]">
                <button id="openModal" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
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


                <table class="min-w-full divide-y divide-gray-200 " id="teams-table">
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

                        <?php
                        $limit = $_REQUEST['limit'] ?? '10';
                        $sql = "select * from users limit $limit";
                        $result = mysqli_query($conn, $sql);
                        $fetched = [];
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo htmlspecialchars($row['name'], ENT_QUOTES); ?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo htmlspecialchars($row['mobile_no'], ENT_QUOTES); ?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo htmlspecialchars($row['email'], ENT_QUOTES); ?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo date('d M Y', strtotime($row['dob'])); ?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo htmlspecialchars(ucfirst($row['role']), ENT_QUOTES); ?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo htmlspecialchars($row['designation'], ENT_QUOTES); ?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php
                                    echo $row['marital_status'] === '1'
                                        ? 'Married'
                                        : 'Single';
                                    ?>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center">
                                        <img
                                            src="<?php echo htmlspecialchars($row['logo_path'], ENT_QUOTES); ?>"
                                            alt="N/A"
                                            class="h-8 w-8 rounded-full">
                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php if ($row['status'] === 'active'): ?>
                                        <span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs font-semibold">
                                            Active
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 rounded-full bg-red-500 text-white text-xs font-semibold">
                                            Inactive
                                        </span>
                                    <?php endif; ?>

                                    <div class="text-xs text-gray-500">
                                        <?php echo "created time" . date('d/m/Y H:i:s', strtotime($row['created_at'])); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex gap-2">

                                        <?php $jsonRow = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>
                                        <button class="text-blue-500 hover:text-blue-700" onclick='openUpdateModal(<?= json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>)'>
                                            <i class="bi bi-pencil-fill text-xl"></i>
                                        </button>


                                        <button class="text-red-500 hover:text-red-700" onclick="openModal(<?= $row['id']; ?>)">
                                            <i class="bi bi-trash-fill text-xl"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>


                    </tbody>
                </table>
            </div>
            <div class="flex justify-end items-center mt-4">

             
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-md w-[400px] max-w-full shadow-lg overflow-hidden">
            <div class="bg-blue-900 text-white px-4 py-3 flex justify-between items-center">
                <h3 class="text-sm font-semibold">Are You Sure for Delete This Record</h3>
                <button onclick="closeModal()" class="text-white text-lg font-bold leading-none">&times;</button>
            </div>

            <div class="px-4 py-3 flex justify-between bg-gray-50">
                <button id="deleteBtn" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded">
                    Delete
                </button>
                <button onclick="closeModal()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded">
                    Cancel
                </button>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    $('#teams-table').DataTable({

    });
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeModal');
    const modal = document.getElementById('modal');

    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
        }
    });

    // modal of delete 

    let deleteId;

    function openModal(id) {
        deleteId = id;
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.add('hidden');
    }

    document.getElementById('deleteBtn').addEventListener('click', () => {
        if (!deleteId) return;

        fetch(`api/deleteuser.php?id=${encodeURIComponent(deleteId)}`, {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Error: ' + data.error);
                } else {
                    alert('Deleted successfully');
                    window.location.reload();
                }
                closeModal();
            })
            .catch(err => {
                alert('Delete request failed: ' + err);
                closeModal();
            });
    });

    // code for update modal

    function openUpdateModal(userData) {
        console.log(userData.gender , userData.status , userData.marital_status)
        document.getElementById('userid').value = userData.id || '';
     document.getElementById('editfullName').value = userData.name || '';
    document.getElementById('editmobileNo').value = userData.mobile_no || '';
    document.getElementById('editemail').value = userData.email || '';
    document.getElementById('editdob').value = userData.dob || '';
    document.getElementById('editmarital_status').value = userData.marital_status || '';
    document.getElementById('editaddress').value = userData.address || '';
    document.getElementById('editrole').value = userData.role || '';
    document.getElementById('editdesignation').value = userData.designation || '';
    document.getElementById('editgender').value = userData.gender || '';
    document.getElementById('editstatus').value = userData.status || '';

    document.getElementById('updateModal').classList.remove('hidden');
        
    }
    const updateModalClosebtn = document.getElementById("closeUpdateModal");
    updateModalClosebtn.addEventListener('click', closeUpdateModal);

    function closeUpdateModal() {
        document.getElementById('updateModal').classList.add('hidden');
    }
</script>