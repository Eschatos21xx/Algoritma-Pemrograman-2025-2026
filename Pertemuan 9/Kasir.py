nama = input("Masukkan Nama Barang: ")
harga = float(input("Masukkan Harga Barang: "))
jumlah = int(input("Masukkan Jumlah Beli: "))
nim3 = int(input("Masukkan 3 Angka Terakhir NIM: "))
nim1 = int(input("Masukkan 1 Angka Terakhir NIM: "))

total = harga * jumlah
minimal = nim3 * 100
diskon_persen = nim1

if total >= minimal:
    diskon = total * (diskon_persen / 100)
else:
    diskon = 0
    diskon_persen = 0

total_bayar = total - diskon

print("\n===== STRUK BELANJA =====")
print(f"Nama Barang        : {nama}")
print(f"Harga Satuan       : {harga}")
print(f"Jumlah Beli        : {jumlah}")
print(f"Total Harga        : {total}")
print(f"Minimal Diskon     : {minimal}")
print(f"Diskon (%)         : {diskon_persen}%")
print(f"Diskon (Rp)        : {diskon}")
print(f"Total Bayar        : {total_bayar}")
print("=========================")
