
package dao;

import conexao.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import modelo.Pedido;

public class PedidoDAO {
      Connection con = null;
    public PedidoDAO(){
        con = new Conexao().conectar();
    }
    
    public String inserir(Pedido c){
        String status = "Pedido inserido com sucesso!";
        String sql = "INSERT INTO pedido (nome,preco,mesa) values (?,?,?)";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getNome());
            ps.setString(2, c.getPreco());
            ps.setString(3, c.getMesa());
            
            int n = ps.executeUpdate();
            if(n == 0){
                status = "Erro ao inserir";
            }
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
        return status;
    }

    public ArrayList<Pedido> listar(){
        ArrayList<Pedido> pedidos = new ArrayList();
        try{
            String sql = "SELECT * FROM pedido";
            PreparedStatement ps = con.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();
            
            while(rs.next()){
                Pedido c = new Pedido();
                c.setId(rs.getString(1));
                c.setNome(rs.getString(2));
                c.setPreco(rs.getString(3));
                c.setMesa(rs.getString(4));
                
               
                pedidos.add(c);
            }
            return pedidos;
        }catch(Exception e){
            return null;
        }
    }
    public String atualizar(Pedido c){
        String status = "Pedido atualizado com sucesso!";
        String sql = "UPDATE pedido SET nome = ?, preco = ?, mesa = ? WHERE id = ?";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            
            ps.setString(1, c.getNome());
            ps.setString(2, c.getPreco());
            ps.setString(3, c.getMesa());
            ps.setString(4, c.getId());
         
            ps.executeUpdate();
            
        }catch(Exception e){
            status = "Erro ao atualizar o pedido";
        }
        return status;
    }
    
    public String excluir(Pedido c){
        String status = "Pedido excluido com sucesso!";
        try{
            String sql = "DELETE FROM pedido WHERE id = ?";
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getId());
            ps.executeUpdate();
        }catch(Exception e){
            status = e.getMessage();
        }
        return status;
    }
}

