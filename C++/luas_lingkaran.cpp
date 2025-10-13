#include <iostream>
using namespace std;

int main()
{
const float pi = 3.14;
    float r, luas;
    cout << "Masukkan jari-jari lingkaran: ";
    cin >> r;
    luas = pi * r * r;
    cout << "Luas lingkaran: " << luas << endl;
    system("pause");
    return 0;
}