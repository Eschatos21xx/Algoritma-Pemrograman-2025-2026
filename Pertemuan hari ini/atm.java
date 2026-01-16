import java.util.*;

public class atm{
    public static void main(String[] args){
        Scanner s = new Scanner(System.in);

        String nama = "";
        while(true){
            System.out.print("Masukkan Nama: ");
            nama = s.nextLine();
            if(!nama.equals("")) break;
        }

        System.out.print("Nama benar? (true/false): ");
        String cek = s.nextLine();
        while(!cek.equals("true")){
            System.out.print("Masukkan Nama: ");
            nama = s.nextLine();
            System.out.print("Nama benar? (true/false): ");
            cek = s.nextLine();
        }

        System.out.print("Masukkan NIM: ");
        String nim = s.nextLine();
        int saldo = Integer.parseInt(nim);

        System.out.println("Nama: "+nama);
        System.out.println("Saldo awal: "+saldo);

        System.out.println("1. Cek Saldo");
        System.out.println("2. Tarik Tunai");
        System.out.println("3. Setor Tunai");
        System.out.println("4. Transfer");
        System.out.println("5. Keluar");

        int p = s.nextInt();
        switch(p){
            case 1: System.out.println(saldo); break;
            case 2: System.out.print("Tarik: "); int t=s.nextInt(); saldo-=t; System.out.println(saldo); break;
            case 3: System.out.print("Setor: "); t=s.nextInt(); saldo+=t; System.out.println(saldo); break;
            case 4: System.out.print("Transfer: "); t=s.nextInt(); saldo-=t; System.out.println(saldo); break;
            default: System.out.println("Keluar");
        }
    }
}