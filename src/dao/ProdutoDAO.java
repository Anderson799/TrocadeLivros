
package dao;

import conexao.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import modelo.Produto;

public class ProdutoDAO {
    Connection con = null;
    public ProdutoDAO(){
        con = new Conexao().conectar();
    }
    
    public String inserir(Produto c){
        String status = "Produto inserido com sucesso!";
        String sql = "INSERT INTO produto (nomeProduto,nomeDistribuidora,quantidade,data) values (?,?,?,?)";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getNomeProduto());
            ps.setString(2, c.getNomeDistribuidora());
            ps.setString(3,c.getQuantidade());
            ps.setString(4,c.getData());
            
            int n = ps.executeUpdate();
            if(n == 0){
                status = "Erro ao inserir";
            }
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
        return status;
    }

    public ArrayList<Produto> listar(){
        ArrayList<Produto> produtos = new ArrayList();
        try{
            String sql = "SELECT nomeProduto,nomeDistribuidora,quantidade,data,id FROM produto";
            PreparedStatement ps = con.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();
            
            while(rs.next()){
                Produto c = new Produto();
               
               c.setNomeProduto(rs.getString(1));
               c.setNomeDistribuidora(rs.getString(2));
               c.setQuantidade(rs.getString(3));
               c.setData(rs.getString(4));
               c.setId(rs.getString(5));
               
                produtos.add(c);
            }
            return produtos;
        }catch(Exception e){
            return null;
        }
    }
    public String atualizar(Produto c){
        String status = "Produto atualizado com sucesso!";
        String sql = "UPDATE produto SET nomeProduto = ?,nomeDistribuidora=?,quantidade=?,data=? WHERE id = ?";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            
            ps.setString(1, c.getNomeProduto());
            ps.setString(2, c.getNomeDistribuidora());
            ps.setString(3, c.getQuantidade());
            ps.setString(4, c.getData());
            ps.setString(5, c.getId());
            
            ps.executeUpdate();
            
        }catch(Exception e){
            status = "Erro ao atualizar o produto";
        }
        return status;
    }
    
    public String excluir(Produto c){
        String status = "Produto excluido com sucesso!";
        try{
            String sql = "DELETE FROM produto WHERE id = ?";
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getId());
            ps.executeUpdate();
        }catch(Exception e){
            status = e.getMessage();
        }
        return status;
    }
}

