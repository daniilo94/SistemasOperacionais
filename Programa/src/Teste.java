public class Teste {

    /*
    O programa sempre executa as threads de forma aleatória
     */
    public static void main(String[] args) {
//****************************************************************************
        Programa p1 = new Programa();
        p1.setId(1);

        Thread t1 = new Thread(p1);
        t1.start();

        Programa p2 = new Programa();
        p2.setId(2);

        Thread t2 = new Thread(p2);
        t2.start();
//****************************************************************************
//        Runnable r = new Runnable() {
//            public void run() {
//                for(int i = 0; i < 10000; i++)
//                    System.out.println("programa 1 valor " + i);
//            }
//        };
//        Thread t = new Thread(r);
//        t.start();
//****************************************************************************
//        Runnable r = () -> {
//            for(int i = 0; i < 10000; i++)
//                System.out.println("programa 1 valor " + i);
//        };
//        Thread t = new Thread(r);
//        t.start();
//****************************************************************************
//        new Thread(() -> {
//            for(int i = 0; i < 10000; i++)
//                System.out.println("programa 1 valor " + i);
//        }).start();
//****************************************************************************
    }
}