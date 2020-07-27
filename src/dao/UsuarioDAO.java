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
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;


public class UsuarioDAO {
   Connection con = null;
       public UsuarioDAO(){
        con = new Conexao().conectar();
    }
    
    public boolean checkLogin(String login, String senha){
       boolean check = false;
        try{
   
           PreparedStatement ps = con.prepareStatement( "SELECT * FROM funcionario WHERE email = ?"
                   + " and senha = ?");
      
           ps.setString(1,login);
           ps.setString(2,senha);
           ResultSet rs = ps.executeQuery();
           
            if(rs.next()){
              check = true;

            }
            
        }catch(SQLException ex){
            Logger.getLogger(UsuarioDAO.class.getName()).log(Level.SEVERE,null,ex);
        }
    return check;
    }}
