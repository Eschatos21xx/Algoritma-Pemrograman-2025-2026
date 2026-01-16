#include <iostream>
#include <string>
using namespace std;

int main() {
    string nama;
    float harga;
    int jumlah, nim3, nim1;

    cout << "Nama barang: ";
    cin >> nama;

    cout << "Harga barang: ";
    cin >> harga;

    cout << "Jumlah beli: ";
    cin >> jumlah;

    cout << "3 angka terakhir NIM: ";
    cin >> nim3;

    cout << "1 angka terakhir NIM: ";
    cin >> nim1;

    float total = harga * jumlah;
    float minimal = nim3 * 100;
    float diskon = (total >= minimal) ? total * (nim1 / 100.0) : 0;
    float total_bayar = total - diskon;

    cout << "\n===== STRUK BELANJA =====\n";
    cout << "Nama Barang        : " << nama << endl;
    cout << "Harga Satuan       : " << harga << endl;
    cout << "Jumlah Beli        : " << jumlah << endl;
    cout << "Total Harga        : " << total << endl;
    cout << "Minimal Diskon     : " << minimal << endl;
    cout << "Diskon (%)         : " << ((diskon == 0) ? 0 : nim1) << "%\n";
    cout << "Diskon (Rp)        : " << diskon << endl;
    cout << "Total Bayar        : " << total_bayar << endl;
    cout << "=========================\n";

    return 0;
}
