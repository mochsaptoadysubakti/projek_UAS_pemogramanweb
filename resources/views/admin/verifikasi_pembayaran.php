<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Verifikasi Pembayaran</h2>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Rental</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pelanggan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pembayaran</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($payments)): ?>
                        <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo $payment['rental_id']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo $payment['user_name']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo $payment['payment_date']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp <?php echo number_format($payment['amount']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo $payment['payment_method']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($payment['status'] === 'pending'): ?>
                                        <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Menunggu</span>
                                    <?php elseif ($payment['status'] === 'approved'): ?>
                                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Disetujui</span>
                                    <?php elseif ($payment['status'] === 'rejected'): ?>
                                        <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Ditolak</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <button @click="openModal('paymentDetailModal<?php echo $payment['rental_id']; ?>')" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Lihat Detail
                                    </button>
                                </td>
                            </tr>

                            <div x-show="modalOpen === 'paymentDetailModal<?php echo $payment['rental_id']; ?>'" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                        Detail Pembayaran #<?php echo $payment['rental_id']; ?>
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p><strong>ID Rental:</strong> <?php echo $payment['rental_id']; ?></p>
                                                        <p><strong>Nama Pelanggan:</strong> <?php echo $payment['user_name']; ?></p>
                                                        <p><strong>Tanggal Pembayaran:</strong> <?php echo $payment['payment_date']; ?></p>
                                                        <p><strong>Jumlah Pembayaran:</strong> Rp <?php echo number_format($payment['amount']); ?></p>
                                                        <p><strong>Metode Pembayaran:</strong> <?php echo $payment['payment_method']; ?></p>
                                                        <p><strong>Bukti Pembayaran:</strong> <a href="<?php echo $payment['proof_of_payment']; ?>" target="_blank" class="text-blue-500 hover:underline">Lihat Bukti</a></p>
                                                        <p><strong>Catatan Pelanggan:</strong> <?php echo $payment['notes']; ?></p>

                                                        <form action="<?php echo base_url('admin/verifikasi_pembayaran'); ?>" method="post" class="mt-4">
                                                            <input type="hidden" name="rental_id" value="<?php echo $payment['rental_id']; ?>">
                                                            <div class="mb-4">
                                                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Ubah Status Pembayaran:</label>
                                                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" @change="toggleReason('<?php echo $payment['rental_id']; ?>', $event.target.value)">
                                                                    <option value="pending" <?php echo ($payment['status'] === 'pending') ? 'selected' : ''; ?>>Menunggu Verifikasi</option>
                                                                    <option value="approved" <?php echo ($payment['status'] === 'approved') ? 'selected' : ''; ?>>Setujui</option>
                                                                    <option value="rejected" <?php echo ($payment['status'] === 'rejected') ? 'selected' : ''; ?>>Tolak</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-4" id="reasonInput<?php echo $payment['rental_id']; ?>" style="display: none;">
                                                                <label for="reason" class="block text-gray-700 text-sm font-bold mb-2">Alasan Penolakan:</label>
                                                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reason" name="reason"></textarea>
                                                            </div>
                                                            <div class="flex items-center justify-end">
                                                                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" @click="closeModal">
                                                                    Tutup
                                                                </button>
                                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                                    Simpan Perubahan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="px-6 py-4 whitespace-nowrap text-center">Tidak ada pembayaran yang menunggu verifikasi.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('paymentVerification', () => ({
                modalOpen: null,
                openModal(modalId) {
                    this.modalOpen = modalId;
                },
                closeModal() {
                    this.modalOpen = null;
                },
                toggleReason(paymentId, status) {
                    const reasonInput = document.getElementById(`reasonInput${paymentId}`);
                    if (status === 'rejected') {
                        reasonInput.style.display = 'block';
                    } else {
                        reasonInput.style.display = 'none';
                    }
                },
            }));
        });
    </script>
</body>
</html>