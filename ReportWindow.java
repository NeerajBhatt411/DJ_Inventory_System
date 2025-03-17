// ReportWindow.java
import javax.swing.*;
import java.awt.*;
import java.sql.*;

public class ReportWindow extends JFrame {
    private JTable table;
    private JScrollPane scrollPane;
    
    public ReportWindow() {
        setTitle("Inventory Report");
        setSize(600, 400);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        
        String[] columnNames = {"ID", "Product Name", "Quantity", "Price"};
        Object[][] data = fetchDataFromDatabase();
        
        table = new JTable(data, columnNames);
        scrollPane = new JScrollPane(table);
        
        add(scrollPane, BorderLayout.CENTER);
    }

    private Object[][] fetchDataFromDatabase() {
        Object[][] data = new Object[0][];
        try {
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dj_inventory", "root", "");
            String query = "SELECT * FROM inventory";
            PreparedStatement stmt = con.prepareStatement(query, ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
            ResultSet rs = stmt.executeQuery();
            
            rs.last();
            int rowCount = rs.getRow();
            rs.beforeFirst();
            
            data = new Object[rowCount][4];
            int i = 0;
            while (rs.next()) {
                data[i][0] = rs.getInt("id");
                data[i][1] = rs.getString("product_name");
                data[i][2] = rs.getInt("quantity");
                data[i][3] = rs.getDouble("price");
                i++;
            }
            
            con.close();
        } catch (SQLException e) {
            e.printStackTrace();
            JOptionPane.showMessageDialog(this, "Error fetching data from database", "Error", JOptionPane.ERROR_MESSAGE);
        }
        return data;
    }
}
