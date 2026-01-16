#include <iostream>
#include <string>
using namespace std;

int main(){
    string nama;
    while(true){
        cout<<"Masukkan Nama: ";
        getline(cin,nama);
        if(nama!="") break;
    }

    string cek;
    cout<<"Nama benar? (true/false): ";
    getline(cin,cek);
    while(cek!="true"){
        cout<<"Masukkan Nama: ";
        getline(cin,nama);
        cout<<"Nama benar? (true/false): ";
        getline(cin,cek);
    }

    string nim;
    cout<<"Masukkan NIM: ";
    getline(cin,nim);
    int saldo = stoi(nim);

    cout<<"Nama: "<<nama<<endl;
    cout<<"Saldo awal: "<<saldo<<endl;

    cout<<"1. Cek Saldo\n2. Tarik Tunai\n3. Setor Tunai\n4. Transfer\n5. Keluar\n";

    int p;
    cin>>p;

    switch(p){
        case 1: cout<<saldo; break;
        case 2: int t; cout<<"Tarik: "; cin>>t; saldo-=t; cout<<saldo; break;
        case 3: cout<<"Setor: "; cin>>t; saldo+=t; cout<<saldo; break;
        case 4: cout<<"Transfer: "; cin>>t; saldo-=t; cout<<saldo; break;
        default: cout<<"Keluar";
    }
}