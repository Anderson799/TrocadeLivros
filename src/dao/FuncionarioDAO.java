
package dao;

import conexao.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import modelo.Funcionario;


public class FuncionarioDAO {
            Connection con = null;
    public FuncionarioDAO(){
        con = new Conexao().conectar();
    }
    
    public String inserir(Funcionario c){
        String status = "Funcionario inserido com sucesso!";
        String sql = "INSERT INTO funcionario (nome, email, senha,cpf) values (?,?,?,?)";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getNome());
            ps.setString(2, c.getEmail());
            ps.setString(3, c.getSenha());
            ps.setString(4,c.getCpf());
            
            int n = ps.executeUpdate();
            if(n == 0){
                status = "Erro ao inserir";
            }
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
        return status;
    }
public ArrayList<Funcionario> listar(){
        ArrayList<Funcionario> funcionario = new ArrayList();
        try{
            String sql = "SELECT nome,email,senha,cpf FROM funcionario";
            PreparedStatement ps = con.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();
            
            while(rs.next()){
                Funcionario c = new Funcionario();
                c.setNome(rs.getString(1));
                c.setEmail(rs.getString(2));
                c.setSenha(rs.getString(3));
                c.setCpf(rs.getString(4));
                
                funcionario.add(c);
            }
            return funcionario;
        }catch(Exception e){
            return null;
        }
    }
    public String atualizar(Funcionario c){
        String status = "Funcionario atualizado com sucesso!";
        String sql = "UPDATE funcionario SET nome = ?, email = ?, senha = ? WHERE cpf = ?";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getNome());
            ps.setString(2, c.getEmail());
            ps.setString(3, c.getSenha());
            ps.setString(4, c.getCpf());
            
            ps.executeUpdate();
            
        }catch(Exception e){
            status = "Erro ao atualizar o Funcionario";
        }
        return status;
    }
    
    public String excluir(Funcionario c){
        String status = "Funcionario excluido com sucesso!";
        try{
            String sql = "DELETE FROM funcionario WHERE cpf = ?";
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getCpf());
            ps.executeUpdate();
        }catch(Exception e){
            status = e.getMessage();
        }
        return status;
    }

}

