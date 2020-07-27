
package conexao;

import java.sql.Connection;
import java.sql.DriverManager;

public class Conexao {
    static String status = "Conexão realizada com sucesso!";
    public static Connection conectar(){
        Connection con = null;
        try{
           Class.forName("com.mysql.jdbc.Driver");
           String url = "jdbc:mysql://localhost/happyburguer";
           con = DriverManager.getConnection(url,"root","");
           System.out.println(status);
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
        return con;
    }
}
