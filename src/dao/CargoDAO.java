
package dao;

import conexao.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import modelo.Cargo;

public class CargoDAO {
     Connection con = null;
    public CargoDAO(){
        con = new Conexao().conectar();
    }
    
    public String inserir(Cargo c){
        String status = "Cargo inserido com sucesso!";
        String sql = "INSERT INTO cargo (nomecargo,comissao) values (?,?)";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            
            ps.setString(1, c.getNomeCargo());
            ps.setString(2, c.getComissao());
            
            int n = ps.executeUpdate();
            if(n == 0){
                status = "Erro ao inserir";
            }
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
        return status;
    }

    public ArrayList<Cargo> listar(){
        ArrayList<Cargo> cargos = new ArrayList();
        try{
            String sql = "SELECT nomecargo,comissao,id FROM cargo";
            PreparedStatement ps = con.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();
            
            while(rs.next()){
                Cargo c = new Cargo();
                c.setNomeCargo(rs.getString(1));
                c.setComissao(rs.getString(2));
                c.setId(rs.getString(3));
                
               
                cargos.add(c);
            }
            return cargos;
        }catch(Exception e){
            return null;
        }
    }
    public String atualizar(Cargo c){
        String status = "Cargo atualizado com sucesso!";
        String sql = "UPDATE cargo SET nomecargo = ?, comissao = ? WHERE id = ?";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getNomeCargo());
            ps.setString(2, c.getComissao());
            ps.setString(3, c.getId());
            
            int n = ps.executeUpdate();
            if(n == 0){
                status = c.getId()+ "";
            }
            
            
        }catch(Exception e){
            e.printStackTrace();
            System.out.println(e);
            
        }
        return status;
    }
    
    public String excluir(Cargo c){
        String status = "Cargo excluido com sucesso!";
        try{
            String sql = "DELETE FROM cargo WHERE id = ?";
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getId());
            ps.executeUpdate();
        }catch(Exception e){
            status = e.getMessage();
        }
        return status;
    }
}
