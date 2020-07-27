/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import conexao.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import modelo.Cliente;

/**
 *
 * @author Andisu
 */
public class ClienteDAO {
     Connection con = null;
    public ClienteDAO(){
        con = new Conexao().conectar();
    }
    
    public String inserir(Cliente c){
        String status = "Cliente inserido com sucesso!";
        String sql = "INSERT INTO cliente (nome, email, senha,cpf) values (?,?,?,?)";
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
public ArrayList<Cliente> listar(){
        ArrayList<Cliente> clientes = new ArrayList();
        try{
            String sql = "SELECT nome,email,senha,cpf FROM cliente";
            PreparedStatement ps = con.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();
            
            while(rs.next()){
                Cliente c = new Cliente();
                c.setNome(rs.getString(1));
                c.setEmail(rs.getString(2));
                c.setSenha(rs.getString(3));
                c.setCpf(rs.getString(4));
                clientes.add(c);
            }
            return clientes;
        }catch(Exception e){
            return null;
        }
    }
    public String atualizar(Cliente c){
        String status = "Cliente atualizado com sucesso!";
        String sql = "UPDATE cliente SET nome = ?, email = ?, senha = ? WHERE cpf = ?";
        try{
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getNome());
            ps.setString(2, c.getEmail());
            ps.setString(3, c.getSenha());
            ps.setString(4, c.getCpf());
            ps.executeUpdate();
            
        }catch(Exception e){
            status = "Erro ao atualizar o cliente";
        }
        return status;
    }
    
    public String excluir(Cliente c){
        String status = "Cliente excluido com sucesso!";
        try{
            String sql = "DELETE FROM Cliente WHERE cpf = ?";
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setString(1, c.getCpf());
            ps.executeUpdate();
        }catch(Exception e){
            status = e.getMessage();
        }
        return status;
    }

}

