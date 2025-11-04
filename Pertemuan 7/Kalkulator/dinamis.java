import java.util.Scanner;

char operator;
double nomor1, nomor2;
Scanner input = new Scanner(System.in);
System.out.print("Masukkan Operator (+ - * / %) = ");
operator = input.next().charAt(0);
System.out.print("Masukkan nomor1 = ");
nomor1 = input.nextDouble();
System.out.print("Masukkan nomor2 = ");
nomor2 = input.nextDouble();
input.close();
switch(operator){
case '+':
System.out.println(nomor1+nomor2);
break;
case '-':
System.out.println(nomor1-nomor2);
break;
case '*':
System.out.println(nomor1*nomor2);
break;
case '/':
System.out.println(nomor1/nomor2);
break;
case '%':
System.out.println(nomor1%nomor2);
break;
}